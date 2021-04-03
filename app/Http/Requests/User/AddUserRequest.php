<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            //
            // 'upload_text' => 'required_without:upload_licensing|json',
            'name' => 'required',
            'password' => 'required',
            'user_type' => 'required',
            'email' => 'required|email|unique:users,email,$this->email,email'
        ];
    }

    public function messages()
    {
        return [
            'email.regex' => 'Given email address is already Register'
        ];
    }
}
