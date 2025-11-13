<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total' => Complaint::count(),
            'pending' => Complaint::where('status', 'pending')->count(),
            'in_review' => Complaint::where('status', 'in_review')->count(),
            'resolved' => Complaint::where('status', 'resolved')->count(),
        ];

        if (Auth::user()->hasRole('student')) {
            $myComplaints = Complaint::where('user_id', Auth::id())->latest()->take(5)->get();
        } else {
            $myComplaints = Complaint::where('assigned_to', Auth::id())->orWhere('user_id', Auth::id())->latest()->take(5)->get();
        }

        return view('dashboard', compact('stats', 'myComplaints'));
    }
}