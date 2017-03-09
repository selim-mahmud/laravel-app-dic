<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstructorRequest extends FormRequest
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
            'name' => 'required|between:3,50',
            'email' => 'required|email' ,
            'phone' => 'required',
            'photo' => 'file|mimes:jpg,jpeg,bmp,png,gif|max:2048',
            'short_description' => 'max:255',
            'long_description' => 'max:2048',
        ];
    }
}
