<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\ComplaintTrack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ComplaintTrackController extends Controller
{
    // عرض صفحة التتبع (للجميع بدون تسجيل دخول)
    public function showForm()
    {
        return view('complaints.track');
    }

    // معالجة طلب التتبع
    public function track(Request $request)
    {
        $request->validate([
            'complaint_id' => 'required|numeric|exists:complaints,id'
        ]);

        $complaint = Complaint::with(['user', 'department', 'category', 'comments.user'])
            ->findOrFail($request->complaint_id);

        // تسجيل عملية التتبع (للإحصاء)
        ComplaintTrack::create([
            'complaint_id' => $complaint->id,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return view('complaints.track-result', compact('complaint'));
    }
}