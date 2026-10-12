<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        if (
            Auth::attempt(
                [
                    'email' => $request->email,
                    'password' => $request->password,
                ]
            )
        ) {
            $request()->session()->regenerate();

            return redirect('/dashboard');
        }

        return back();
    }
}
