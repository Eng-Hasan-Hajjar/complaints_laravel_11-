<?php

namespace App\Http\Controllers;

use App\Models\ComplaintNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = ComplaintNotification::where('user_id', Auth::id())
            ->latest()
            ->paginate(15);

        $unreadCount = ComplaintNotification::where('user_id', Auth::id())
            ->whereNull('read_at')
            ->count();

        return view('notifications.index', compact('notifications', 'unreadCount'));
    }

    public function markRead(ComplaintNotification $notification)
    {
        abort_if($notification->user_id !== Auth::id(), 403);

        if (is_null($notification->read_at)) {
            $notification->update(['read_at' => now()]);
        }

        return back();
    }

    public function markAllRead()
    {
        ComplaintNotification::where('user_id', Auth::id())
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return back()->with('success', 'تم تمييز كل الإشعارات كمقروءة.');
    }
}
