<?php

namespace App\Http\Controllers\Account;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $replies = $user->replies()
            ->with('topic')
            ->latest()
            ->paginate(5);

        return view('account.profile', [
            'user' => $user,
            // 'topics' => $topics,
            'replies' => $replies,
        ]);
    }

    public function store(Request $request)
    {
        $request->user()->update($request->only('name', 'email'));

        return back()->withSuccess('Your profile has been updated.');
    }
}
