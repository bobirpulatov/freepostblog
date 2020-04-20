<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class Signup extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
           'name' => 'required|min:5|max:70',
           'email' => 'required|max:255|email',
           'password' => 'required|min:6'
        ];
    }

    public function messages()
    {
      return [
         'name.required' => ':Attribute input is required',
         'name.min' => ':Attribute should be :min characters',
         'email.required'  => ':Attribute input is required',
         'password.required'  => 'Password input is required',
      ];
    }

}
