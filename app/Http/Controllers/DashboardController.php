<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('farmer.dashboard', [
            "username" => $user->name,
            "user_email" => $user->email,
            "user_role" => $user->role,
            "requests" => $user->serviceRequests
        ]);
    }
}
