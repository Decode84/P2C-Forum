<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => ['required', 'string', 'max:255', 'unique:users', 'alpha_dash', 'min:3', 'max:15'],
            // 'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            'bio' => ['nullable', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'cover' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'username.required' => 'The username is required',
            'username.string' => 'The username must be a string',
            'username.max' => 'The username must be less than 255 characters',
            'username.unique' => 'The username has already been taken',
            'username.alpha_dash' => 'The username may only contain letters, numbers, dashes and underscores',
            'username.min' => 'The username must be at least 3 characters',
            'username.max' => 'The username must be less than 15 characters',
            // 'name.required' => 'The name is required',
            // 'name.string' => 'The name must be a string',
            // 'name.max' => 'The name must be less than 255 characters',
            // 'email.required' => 'The email is required',
            // 'email.string' => 'The email must be a string',
            // 'email.email' => 'The email must be a valid email address',
            // 'email.max' => 'The email must be less than 255 characters',
            // 'email.unique' => 'The email has already been taken',
            'password.required' => 'The password is required',
            'password.string' => 'The password must be a string',
            'password.min' => 'The password must be at least 6 characters',
            'password.confirmed' => 'The password confirmation does not match',
            'bio.string' => 'The bio must be a string',
            'bio.max' => 'The bio must be less than 255 characters',
            'avatar.image' => 'The avatar must be an image',
            'avatar.mimes' => 'The avatar must be a file of type: jpeg, png, jpg, gif',
            'avatar.max' => 'The avatar must be less than 2048 kilobytes',
            'cover.image' => 'The cover must be an image',
            'cover.mimes' => 'The cover must be a file of type: jpeg, png, jpg',
            'cover.max' => 'The cover must be less than 2048 kilobytes',
        ];
    }
}
