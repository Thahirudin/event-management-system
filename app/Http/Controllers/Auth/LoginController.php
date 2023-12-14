<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($request->jabatan == 'Member' && Auth::guard('member')->attempt($credentials)) {
            return redirect(route('member-list-order'));
        }
        elseif ($request->jabatan == 'Organizer' && Auth::attempt($credentials)) {
            if(Auth::user()->jabatan == 'Admin'){
                return redirect()->route('admin-dashboard');
            }elseif(Auth::user()->jabatan == 'Organizer'){
                return redirect()->route('organizer-dashboard');
            }
        }
        

        // Jika login gagal, kembalikan dengan pesan atau tanggapan lainnya
        return back()->withErrors(['email' => 'Login failed.']);
    }
    // protected function authenticated(Request $request, $user)
    // {
    //     // Tambahkan logika pengalihan berdasarkan jabatan
    //     if ($request->jabatan == 'Organizer' && $user->jabatan == 'Admin') {
    //         return redirect()->route('admin-dashboard'); // Sesuaikan dengan rute dashboard admin Anda
    //     } elseif ($request->jabatan == 'Organizer' && $user->jabatan == 'Organizer') {
    //         return redirect()->route('organizer-dashboard'); // Sesuaikan dengan rute dashboard organizer Anda
    //     } elseif($request->jabatan == 'Member') {
    //         return redirect()->route('member-list-order'); // Redirect default untuk jabatan lainnya
    //     }
    // }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // Metode logout di dalam controller
    public function logoutmember(Request $request)
    {
        Auth::guard('member')->logout();

        // Redirect atau tanggapi sesuai kebutuhan
        return redirect('/');
    }

}