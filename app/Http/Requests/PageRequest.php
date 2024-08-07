<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'domain' => [
                'required',
                'unique:pages,domain',
                'regex:/^(?!:\/\/)(?=.{1,255}$)[0-9A-Za-z]([0-9A-Za-z-]{0,61}[0-9A-Za-z])?(\.[A-Za-z]{2,})+$/'
            ],
            'name' => 'required',
            'logo' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Not be empty',
            'domain.required' => 'Not be empty',
            'domain.regex' => 'invalid domain',

            'domain.unique' => 'domain already exists',
            'logo.required' => '  Not be empty',
        ];
    }
}
