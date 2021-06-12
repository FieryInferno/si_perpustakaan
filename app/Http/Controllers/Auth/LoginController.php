<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        Request()->validate([
            'email' => 'required|email',
            'password' => 'required',

        ], [
            'email.required' => 'Silakan diisi!',
            'password.required' => 'Silakan diisi!'
        ]);

        if (Auth::attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->is_admin == 1) {
                // return redirect()->route('admin.home');
                return redirect()->route('admin');
            } else {
                // return redirect()->route('home');
                return redirect()->route('petugas');
            }
        } else {
            // Jika login gagal
            return redirect()->back()->withInput($request->only('email', 'password'))->withErrors([
                'approve' => 'Password salah atau Email anda belum terdaftar',
            ]);
        }
    }
}
