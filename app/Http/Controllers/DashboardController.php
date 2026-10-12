<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('farmer.dashboard', [
            "username" => $user->name,
            "user_email" => $user->email,
            "user_role" => $user->role,
            "requests" => $user->serviceRequests
        ]);
    }
}
