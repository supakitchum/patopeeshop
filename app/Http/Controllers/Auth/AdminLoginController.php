<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;


    protected $guard = 'admin';


    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/backend';


    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm()
    {
        return view('auth.admin.login');

    }


    public function login(Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => 'required|recaptcha'
        ]);
        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('backend.dashboard');
        }
        return back()->withErrors(['email' => 'Email or password are wrong.']);

    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('backend.login');
    }
}
