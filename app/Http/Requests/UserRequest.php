<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'password' => 'required|min:6|confirmed',
            'email'=>'required|unique:users,email',
            'name' => 'required',
            'image' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>'Not be empty',
            'password.required' =>'Not be empty',
            'password.min' =>'Password must be at least 6 characters',
            'email.required' =>'Not be empty',
            'email.unique' =>'Email already exists',
             'image.required' =>'  Not be empty',
             'password.confirmed' => 'Confirm passwords do not match.',
        ];
    }
}
