<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserCreateRequest extends Request
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
        /*if('registration_type' == 'school'){
            $regotype = 'required|between:5,100';
            }elseif ('registration_type' == 'learner'){
            $regotype = '';
        }*/

        return [
            //
            'name' => 'required|between:5,50',
            'school_name' => 'required_if:registration_type,1|between:5,100',
            'email' => 'required|email|unique:user,email' ,
            'password' => 'required',
            'confpass' => 'required|same:password',
        ];
    }

    public function messages()
    {

        return [
            'name.required' => 'Name field cannot be empty',
            'school_name.registration_type' => 'School name cannot be empty',
            'confpass.same' => 'Confirm Password does not match'
        ]; // TODO: Change the autogenerated stub
    }
}
