<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'full_name' => 'required|string|between:3,50',
            'email' => 'required|email' ,
            'contact_number' => 'nullable|digits_between:8,14',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2048',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }
}
