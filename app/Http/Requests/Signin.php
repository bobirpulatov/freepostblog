<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Signin extends FormRequest
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
         'email' => 'required|max:255|email',
         'password' => 'required|min:6'
      ];
    }

    public function messages()
    {
      return [
         'email.required'  => ':Attribute input is required',
         'password.required'  => 'Password input is required'
      ];
    }
}
