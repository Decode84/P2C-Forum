<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTopicRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:255'],
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
            'title.required' => 'The topic title is required',
            'title.string' => 'The topic title must be a string',
            'title.min' => 'The topic title must be at least 3 characters',
            'title.max' => 'The topic title must be less than 255 characters',
            'body.required' => 'The topic body is required',
            'body.string' => 'The topic body must be a string',
            'body.min' => 'The topic body must be at least 3 characters',
            'body.max' => 'The topic body must be less than 1440 characters',
        ];
    }
}
