<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the login view
     *
     * @return void
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Attempt to authenticate a new session
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {

            // If the user has the role banned then logout the user
            if (Auth::user()->hasRole('banned')) {
                Auth::logout();
                return redirect()->route('auth.login')->with('error', 'Your account has been banned.');
            }

            return redirect()->intended('forum');
        }

        return redirect()->back();
    }

    /**
     * Destroy the authenticated session.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('auth.login'));
    }
}
