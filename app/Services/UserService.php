<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @var User $user
     */
    public function createUser(array $userData): User
    {
        return User::create([
            'username' => $userData['username'],
            'password' => Hash::make($userData['password']),
        ]);
    }
}
