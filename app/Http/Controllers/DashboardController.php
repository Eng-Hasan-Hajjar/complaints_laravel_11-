<?php

namespace App\Http\Controllers;

use App\Models\Complaint;

use App\Models\ComplaintNotification;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // =========================
        // STUDENT DASHBOARD
        // =========================
        if ($user->hasRole('student')) {

            $myComplaints = Complaint::where('user_id', $user->id)
                ->latest()->take(5)->get();

            $stats = [
                'total'     => Complaint::where('user_id', $user->id)->count(),
                'pending'   => Complaint::where('user_id', $user->id)->where('status', 'pending')->count(),
                'in_review' => Complaint::where('user_id', $user->id)->where('status', 'in_review')->count(),
                'resolved'  => Complaint::where('user_id', $user->id)->where('status', 'resolved')->count(),
                'closed'    => Complaint::where('user_id', $user->id)->where('status', 'closed')->count(),
            ];

            $notifications = ComplaintNotification::where('user_id', $user->id)
                ->latest()->take(8)->get();

            $unreadCount = ComplaintNotification::where('user_id', $user->id)
                ->whereNull('read_at')->count();

            return view('dashboard-student', compact('stats', 'myComplaints', 'notifications', 'unreadCount'));
        }

        // =========================
        // DOCTOR DASHBOARD (اختياري)
        // =========================
        if ($user->hasRole('doctor')) {
            // ممكن تعمل داشبورد للدكتور لاحقاً
            // حالياً خليه مثل الموظف
        }

        // =========================
        // ADMIN / EMPLOYEE DASHBOARD
        // =========================
        $totalUsers      = User::count();
        $totalDepartments= Department::count();
        $totalCategories = Category::count();
        $totalComplaints = Complaint::count();

        $pendingComplaints  = Complaint::where('status', 'pending')->count();
        $inReviewComplaints = Complaint::where('status', 'in_review')->count();
        $resolvedComplaints = Complaint::where('status', 'resolved')->count();
        $closedComplaints   = Complaint::where('status', 'closed')->count();

        $urgentComplaints   = Complaint::where('priority', 'urgent')->count();
        $highPriority       = Complaint::where('priority', 'high')->count();

        $todayComplaints = Complaint::whereDate('created_at', Carbon::today())->count();
        $weekComplaints  = Complaint::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();

        $latestComplaints = Complaint::with(['user', 'department', 'category'])
            ->latest()->take(7)->get();

        $topDepartments = Department::withCount('complaints')
            ->orderByDesc('complaints_count')->take(5)->get();

        $avgResponseTime = Comment::where('is_admin', true)
            ->join('complaints', 'comments.complaint_id', '=', 'complaints.id')
            ->selectRaw('AVG(TIMESTAMPDIFF(HOUR, complaints.created_at, comments.created_at)) as avg_hours')
            ->value('avg_hours');

        return view('dashboard', compact(
            'totalUsers',
            'totalDepartments',
            'totalCategories',
            'totalComplaints',
            'pendingComplaints',
            'inReviewComplaints',
            'resolvedComplaints',
            'closedComplaints',
            'urgentComplaints',
            'highPriority',
            'todayComplaints',
            'weekComplaints',
            'latestComplaints',
            'topDepartments',
            'avgResponseTime'
        ));
    }

}