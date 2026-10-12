<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        $user = Auth::user();
        $requests = $user->serviceRequests;

        $stats = [
            'total' => $requests->count(),
            'pending' => $requests->whereNotIn('status', ['resolved', 'closed'])->count(),
            'resolved' => $requests->whereIn('status', ['resolved', 'closed'])->count(),
        ];

        return view('farmer.dashboard', [
            "username" => $user->name,
            "user_email" => $user->email,
            "user_role" => $user->role,
            "requests" => $requests,
            "stats" => $stats,
        ]);
    }
}
