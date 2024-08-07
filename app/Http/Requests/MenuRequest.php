<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
  

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'url' => 'required|string|unique:menus',
            'position' => 'required|integer|unique:menus',
        ];
        
    }
    public function messages()
    {
        return [
            'title.required' => 'Title is required.',
            'title.string' => 'Title must be a string.',
            'title.unique' => 'Title already exists.',
            'url.required' => 'URL is required.',
            'url.string' => 'URL must be a string.',
            'url.unique' => 'URL already exists.',
            'position.required' => 'Position is required.',
            'position.integer' => 'Position must be an integer.',
            'position.unique' => 'Position already exists.',
            'active.required' => 'Active status is required.',
            'active.boolean' => 'Active status must be true or false.',
        ];
    }
}
