<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        // Validate the input fields
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Redirect based on user status
            if ($user->status == 2) {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('menu');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }
}
