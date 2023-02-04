<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeactivateRequest;

class DeactivateController extends Controller
{
    public function index()
    {
        return view('account.deactivate');
    }

    public function store(StoreDeactivateRequest $request)
    {
        // Get the user
        $user = $request->user();

        $user->delete();

        return redirect('/')->withSuccess('Your account has been deactivated.');
    }
}
