<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationAsLearnerRequest extends FormRequest
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
            'display_name' => 'required|between:2,50',
            'email' => 'required|email|unique:user,email' ,
            'password' => 'required|alpha_num|between:6,15',
            'confirm_password' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field cannot be empty.',
            'name.between' => 'Name must be between 3 to 50 characters long.',
            'password.alpha_num' => 'password excepts only letters, number and special characters like *, & or @.',
        ];
    }
}
