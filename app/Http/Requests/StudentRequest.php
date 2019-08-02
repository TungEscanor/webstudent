<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
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
        if($this->request->has('username')) {
            return [
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'min:6|required_with:re_password|same:re_password',
                're_password' => 'min:6',
                'name' => 'required',
                'birthday' => 'required|date|date_format:Y-m-d|after:1-1-1990|before:31-12-2001',
                'gender' => 'required',
                'phone_number' => ['digits_between:9,11','numeric','nullable','min:0',
                    Rule::unique('students')->ignore($this->student)]
            ];
        }else {
            return [
                'name' => 'required',
                'birthday' => 'required|date|date_format:Y-m-d|after:1-1-1990|before:31-12-2001',
                'gender' => 'required',
                'phone_number' => ['digits_between:9,11','numeric','nullable','min:0',
                    Rule::unique('students')->ignore($this->student)]
            ];
        }
    }
}
