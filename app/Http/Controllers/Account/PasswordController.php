<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function index()
    {
        return view('account.password');
    }

    public function store(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = $request->user();

        if (! $user->verifyPassword($request->current_password)) {
            return back()->withErrors([
                'current_password' => 'The current password is incorrect.',
            ]);
        }

        $user->password = bcrypt($request->password);
        $user->save();

        return back()->withSuccess('Your password has been updated.');
    }
}
