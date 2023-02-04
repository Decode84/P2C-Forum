<?php

namespace App\Http\Controllers\Auth;

use App\Events\NewUserRegistered;
use App\Models\Voucher;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Providers\RouteServiceProvider;

class RegisterController extends Controller
{
    public function __constract()
    {
        $this->middleware('guest');
    }

    /**
     * Show the registration view
     *
     * @return void
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Create a new user
     *
     * @param StoreUserRequest $request
     * @param UserService $userService
     * @return void
     */
    public function store(StoreUserRequest $request, UserService $userService)
    {
        $voucher = $request->voucher;

        if (Voucher::where('code', $voucher)->exists()) {
            $user = $userService->createUser($request->validated());

            Voucher::where('code', $voucher)->update(['redeemed_by' => $user->id]);
            Voucher::where('code', $voucher)->update(['redeemed_at' => now()]);

            Auth::login($user);

            NewUserRegistered::dispatch($user);

            return redirect(RouteServiceProvider::HOME);
        }
    }
}
