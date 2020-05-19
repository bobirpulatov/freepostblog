<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPost extends FormRequest
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
        'post_id' => 'required|exists:posts,id',
        'title' => 'required|min:5|max:70',
        'description' => 'required|min:5',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
      ];
    }
}
