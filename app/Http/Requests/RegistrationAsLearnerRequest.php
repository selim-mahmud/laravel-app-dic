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
            'email' => 'required|email|unique:users,email' ,
            'password' => 'required|between:6,15|regex:/^[ A-Za-z0-9!@#$%&_-]*$/',
            'confirm_password' => 'required|same:password',
            'g-recaptcha-response' => 'required|captcha',

        ];
    }

    public function messages()
    {
        return [
            'password.regex' => 'password excepts only letters, number and some special characters.',
        ];
    }
}
