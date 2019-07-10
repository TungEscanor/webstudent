<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarkRequest extends FormRequest
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
            'mark'=> 'required|numeric|between:1,10',
            'student_id' => 'required',
            'subject_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'mark.between:0,10' => 'Mark is only from 0 to 10',
            'student_id.required' => 'Please chose student_id',
            'subject_id.required' => 'Please chose subject_id',
        ];
    }
}
