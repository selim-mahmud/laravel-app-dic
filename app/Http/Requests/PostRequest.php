<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|string|unique:posts,title|max:255',
            'excerpt' => 'required|string|max:2000' ,
            'body' => 'required',
            'category' => 'required|min:1',
            'photo' => 'file|mimes:jpg,jpeg,bmp,png,gif|max:3048',
            'published' => 'required|in:Yes,No',
        ];
    }
}
