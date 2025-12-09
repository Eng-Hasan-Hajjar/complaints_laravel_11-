<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use App\Models\Category;
use App\Models\Complaint;
use App\Models\Comment;
use App\Models\ComplaintNotification;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        // إحصائيات عامة
        $totalUsers     = User::count();


        $totalAdmins    = User::role('admin')->count();
        $totalEmployees = User::role('employee')->count();
        $totalDoctors   = User::role('doctor')->count();
        $totalStudents  = User::role('student')->count();

/*
        $totalAdmins    = User::where('role', 1)->count();  // مدير
        $totalEmployees = User::where('role', 2)->count();  // موظف
        $totalDoctors   = User::where('role', 3)->count();  // دكتور
        $totalStudents  = User::where('role', 4)->count();  // طالب
*/
        $totalDepartments   = Department::count();
        $totalCategories    = Category::count();
        $totalComplaints    = Complaint::count();

        // إحصائيات الشكاوى حسب الحالة
        $pendingComplaints  = Complaint::where('status', 'pending')->count();
        $inReviewComplaints = Complaint::where('status', 'in_review')->count();
        $resolvedComplaints = Complaint::where('status', 'resolved')->count();
        $closedComplaints   = Complaint::where('status', 'closed')->count();

        // إحصائيات حسب الأولوية
        $urgentComplaints   = Complaint::where('priority', 'urgent')->count();
        $highPriority       = Complaint::where('priority', 'high')->count();

        // شكاوى اليوم والأسبوع
        $todayComplaints    = Complaint::whereDate('created_at', Carbon::today())->count();
        $weekComplaints     = Complaint::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();

        // أحدث 7 شكاوى
        $latestComplaints = Complaint::with(['user', 'department', 'category'])
            ->latest()
            ->take(7)
            ->get();

        // أكثر الأقسام شكاوى
        $topDepartments = Department::withCount('complaints')
            ->orderByDesc('complaints_count')
            ->take(5)
            ->get();

        // معدل الاستجابة (متوسط الوقت من التقديم إلى أول رد)
        $avgResponseTime = Comment::where('is_admin', true)
            ->join('complaints', 'comments.complaint_id', '=', 'complaints.id')
            ->selectRaw('AVG(TIMESTAMPDIFF(HOUR, complaints.created_at, comments.created_at)) as avg_hours')
            ->value('avg_hours');

        return view('dashboard', compact(
            'totalUsers',
            'totalAdmins',
            'totalEmployees',
            'totalDoctors',
            'totalStudents',
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