<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class MemberLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.member-login');
    }

    // Menangani proses login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('member')->attempt($credentials)) {
            // Jika login berhasil
            return redirect()->intended('/dashboard');
        }

        // Jika login gagal, kembalikan dengan pesan atau tanggapan lainnya
        return back()->withErrors(['email' => 'Login failed.']);
    }
}