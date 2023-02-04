<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;

class ForgotController extends Controller
{
    /**
     * Show the forgot password view.
     *
     * @return void
     */
    public function create()
    {
        return view('auth.forgot');
    }
}
