<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
    

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
    protected function authenticated(Request $request, $user)
    {
        // Tambahkan logika pengalihan berdasarkan jabatan
        if ($user->jabatan == 'Admin') {
            return redirect()->route('admin-dashboard'); // Sesuaikan dengan rute dashboard admin Anda
        } elseif ($user->jabatan == 'Organizer') {
            return redirect()->route('organizer-dashboard'); // Sesuaikan dengan rute dashboard organizer Anda
        } else {
            return redirect()->route('member-dashboard'); // Redirect default untuk jabatan lainnya
        }
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}