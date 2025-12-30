<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Category;
use App\Models\Department;
use App\Models\Comment;
use App\Models\ComplaintNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ComplaintController extends Controller
{
    public function index(Request $request)
    {
        $query = Complaint::with(['user', 'category', 'department', 'assignedUser']);

        if (Auth::user()->hasRole('student')) {
            $query->where('user_id', Auth::id());
        } elseif (Auth::user()->hasRole('doctor')) {
            $query->whereHas('department', fn($q) => $q->where('manager_id', Auth::id()))
                  ->orWhere('assigned_to', Auth::id());
        } elseif (!Auth::user()->hasRole('admin')) {
            $query->where('assigned_to', Auth::id());
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $complaints = $query->latest()->paginate(15);
        return view('complaints.index', compact('complaints'));
    }


    public function create(Request $request)
    {
        $categories = Category::all();
        $departments = Department::orderBy('name')->get();

        $selectedDepartmentId = $request->get('department_id');

        return view('complaints.create', compact('categories', 'departments', 'selectedDepartmentId'));
    }


    public function create_old()
    {
        $categories = Category::all();
        $departments = Department::all();
        return view('complaints.create', compact('categories', 'departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'department_id' => 'required|exists:departments,id',
            'priority' => 'required|in:low,medium,high,urgent',
            'attachment.*' => 'nullable|file|mimes:jpg,png,pdf,docx|max:5120',
        ]);

        $attachments = [];
        if ($request->hasFile('attachment')) {
            foreach ($request->file('attachment') as $file) {
                $path = $file->store('complaints', 'public');
                $attachments[] = $path;
            }
        }

        $complaint = Complaint::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'department_id' => $request->department_id,
            'priority' => $request->priority,
            'attachment' => $attachments,
        ]);

        $this->notifyAdmins("شكوى جديدة: {$complaint->title}", $complaint);

        return redirect()->route('complaints.index')->with('success', 'تم تقديم الشكوى بنجاح.');
    }

    public function show(Complaint $complaint)
    {
        $this->authorizeComplaint($complaint);
        $complaint->load(['comments.user', 'user', 'category', 'department']);
        return view('complaints.show', compact('complaint'));
    }

    public function assign(Request $request, Complaint $complaint)
    {
        $request->validate(['assigned_to' => 'required|exists:users,id']);
        $complaint->update(['assigned_to' => $request->assigned_to, 'status' => 'in_review']);
        $this->notifyUser($request->assigned_to, "تم تعيينك على شكوى: {$complaint->title}", $complaint);
        return back()->with('success', 'تم تعيين المسؤول بنجاح.');
    }

    public function updateStatus(Request $request, Complaint $complaint)
    {
        $request->validate(['status' => 'required|in:pending,in_review,resolved,closed']);
        $complaint->update(['status' => $request->status]);
        $this->notifyUser($complaint->user_id, "تم تحديث حالة شكواك: {$complaint->status}", $complaint);
        return back()->with('success', 'تم تحديث الحالة.');
    }

    public function comment(Request $request, Complaint $complaint)
    {
        $request->validate(['message' => 'required|string']);
        Comment::create([
            'complaint_id' => $complaint->id,
            'user_id' => Auth::id(),
            'message' => $request->message,
            'is_admin' => !Auth::user()->hasRole('student'),
        ]);

        $this->notifyUser(
            $complaint->user_id == Auth::id() ? $complaint->assigned_to : $complaint->user_id,
            "تعليق جديد على شكواك",
            $complaint
        );

        return back();
    }

    protected function authorizeComplaint($complaint)
    {
        if (Auth::user()->hasRole('student') && $complaint->user_id != Auth::id()) {
            abort(403);
        }
        if (!Auth::user()->hasRole('admin') && !in_array(Auth::id(), [$complaint->user_id, $complaint->assigned_to])) {
            abort(403);
        }
    }

    protected function notifyAdmins($message, $complaint)
    {
        $admins = \App\Models\User::whereHas('roles', fn($q) => $q->where('name', 'admin'))->get();
        foreach ($admins as $admin) {
            ComplaintNotification::create([
                'user_id' => $admin->id,
                'complaint_id' => $complaint->id,
                'message' => $message,
            ]);
        }
    }

    protected function notifyUser($userId, $message, $complaint)
    {
        if ($userId) {
            ComplaintNotification::create([
                'user_id' => $userId,
                'complaint_id' => $complaint->id,
                'message' => $message,
            ]);
        }
    }


    public function edit(Complaint $complaint)
{
    $this->authorizeComplaint($complaint);

    $categories = Category::all();
    $departments = Department::orderBy('name')->get();

    return view('complaints.edit', compact('complaint', 'categories', 'departments'));
}

public function update(Request $request, Complaint $complaint)
{
    $this->authorizeComplaint($complaint);

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'category_id' => 'nullable|exists:categories,id',
        'department_id' => 'required|exists:departments,id',
        'priority' => 'required|in:low,medium,high,urgent',
        'attachment.*' => 'nullable|file|mimes:jpg,png,pdf,docx|max:5120',
    ]);

    // ارفع ملفات جديدة (اختياري: تضيف بدل الملفات القديمة)
    $attachments = $complaint->attachment ?? [];

    if ($request->hasFile('attachment')) {
        foreach ($request->file('attachment') as $file) {
            $path = $file->store('complaints', 'public');
            $attachments[] = $path;
        }
    }

    $complaint->update([
        'title' => $request->title,
        'description' => $request->description,
        'category_id' => $request->category_id,
        'department_id' => $request->department_id,
        'priority' => $request->priority,
        'attachment' => $attachments,
    ]);

    return redirect()->route('complaints.show', $complaint)->with('success', 'تم تحديث الشكوى بنجاح.');
}

public function destroy(Complaint $complaint)
{
    $this->authorizeComplaint($complaint);

    // حذف المرفقات من التخزين (اختياري لكنه أنظف)
    if (!empty($complaint->attachment) && is_array($complaint->attachment)) {
        foreach ($complaint->attachment as $file) {
            try {
                Storage::disk('public')->delete($file);
            } catch (\Throwable $e) {
                // تجاهل الأخطاء
            }
        }
    }

    $complaint->delete();

    return redirect()->route('complaints.index')->with('success', 'تم حذف الشكوى بنجاح.');
}



}   