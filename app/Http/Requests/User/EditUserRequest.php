<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'name' => 'required',
            // 'user_type' => 'required',
            // 'mobile' => 'required',
            // 'email' => 'required|email|unique:users,email,'.$this->route('userid').',id'

        ];
    }

    public function messages()
    {
        return [
            'email.regex' => 'Given email address is already Register'
        ];
    }
}
