<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function indexLogin() {
        return view('login.index');
    }

    public function auth(Request $request) {
        $login = $request->validate([
            "email" => "required|email",
            "password" => "required|min:8",
        ]);

        if (Auth::attempt($login)) {
            $request->session()->regenerate();
            
            if(Auth::user()->is_admin == 1) {
                return redirect()->intended('dashboard');
            } else {
                return redirect()->intended('dashboard/student');
            }
        }

        return back()->with('loginError', 'Login Error, Email atau Password tidak sesuai');
    } 

    public function logout(Request $request) {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerate();

        return redirect()->intended('/login');
    }
}
