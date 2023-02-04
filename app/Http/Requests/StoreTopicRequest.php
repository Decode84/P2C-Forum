<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTopicRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:5', 'max:255'],
            'content' => ['required', 'string', 'min:25', 'max:1440'],
            'category_id' => ['required', 'exists:categories,id'],
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
            'title.min' => 'The topic title must be at least 5 characters',
            'title.max' => 'The topic title must be less than 255 characters',
            'content.required' => 'The topic content is required',
            'content.string' => 'The topic content must be a string',
            'content.min' => 'The topic content must be at least 25 characters',
            'content.max' => 'The topic content must be less than 1440 characters',
        ];
    }
}
