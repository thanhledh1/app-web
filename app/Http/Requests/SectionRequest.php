<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
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
            'name' => 'required',
            'filename' => 'required',
            'cos'=>'required|unique:sessions,cos',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Not be empty',
            'filename.required' => 'required',
          
        ];
    }
}
