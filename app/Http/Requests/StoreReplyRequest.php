<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReplyRequest extends FormRequest
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
            'content' => ['required', 'string', 'min:3', 'max:1440'],
            'topic_id' => ['required', 'exists:topics,id'],
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
            'content.required' => 'The reply body is required',
            'content.string' => 'The reply body must be a string',
            'content.min' => 'The reply body must be at least 3 characters',
            'content.max' => 'The reply body must be less than 1440 characters',
        ];
    }
}
