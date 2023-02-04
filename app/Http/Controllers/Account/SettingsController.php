<?php

namespace App\Http\Controllers\Account;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Validation\ValidationException;

class SettingsController extends Controller
{
    public function index()
    {
        // Get the user from the database
        $user = Auth::user();

        return view('account.settings.index', [
            'user' => $user,
        ]);
    }

    public function updateProfile(Request $request)
    {
        // Get the user from the database
        $user = Auth::user();

        // Validate the request
        $this->validate($request, [
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'bio' => ['nullable', 'max:255'],
        ]);

        // Update the user
        $user->update($request->only('email', 'bio'));

        return back()->withSuccess('Your profile has been updated.');
    }

    public function updateCover(Request $request)
    {
        // Validate the request
        $this->validate($request, [
            'cover' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        // Get file and extension from the request
        $cover = $request->file('cover');
        $extension = $request->cover->extension();

        // Generate a random string
        $randomName = Str::random(16);
        $filename = 'cover' . '_' . $randomName . '.' . $extension;

        // Get the user from the database and update the cover
        $user = Auth::user();
        if ($user->cover) {
            Storage::disk('public')->delete('covers/' . $user->cover);
        }

        // Store the cover in the database and in the storage folder (public/covers) and update the user
        $cover->storeAs('covers', $filename, 'public');
        $user->update([
            'cover' => $filename,
        ]);

        return redirect()->back()->with('success', 'Your cover has been updated.');
    }

    public function updateAvatar(Request $request)
    {
        $this->validate($request, [
            'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        // // Return error if the mime type is not supported
        // if (!in_array($request->avatar->getMimeType(), ['image/jpeg', 'image/png', 'image/gif'])) {
        //     throw ValidationException::withMessages([
        //         'avatar' => 'The avatar must be a file of type: jpeg, png, jpg, gif.',
        //     ]);
        // }

        // If the file is not an image or is too big (max 2MB) or is not a jpeg, png or jpg file then throw an error
        // if (!$request->file('avatar')->isValid() || $request->file('avatar')->getSize() > 2048 || !$request->file('avatar')->getMimeType() == 'image/jpeg' || !$request->file('avatar')->getMimeType() == 'image/png' || !$request->file('avatar')->getMimeType() == 'image/jpg') {
        //     return redirect()->back()->with('error', 'Your avatar could not be updated.');
        // }

        // If the validate fails then throw an error


        $avatar = $request->file('avatar');
        $extension = $request->avatar->extension();

        // Validate that the width and height of the image has a minimum of 1px
        $size = getimagesize($avatar);
        $width = $size[0];
        $height = $size[1];

        if ($width < 1 || $height < 1) {
            return back()->withErrors('The image is too small.');
        }

        // Get the user from the database and delete the old avatar
        $user = Auth::user();
        if ($user->avatar) {
            // unlink(public_path('avatars/' . auth()->user()->avatar));
            Storage::disk('public')->delete('avatars/' . $user->avatar);
        }

        // Generate a random string
        $randomName = Str::random(16);
        $filename = 'avatar' . '_' . $randomName . '.' . $extension;

        // Store the avatar
        $avatar->storeAs('avatars', $filename, 'public'); // Insecure and should upload to other site.

        // Update the user's avatar
        $user->update([
            'avatar' => $filename,
        ]);

        return redirect()->back()->with('success', 'Your avatar has been updated.');
    }
}
