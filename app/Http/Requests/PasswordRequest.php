<?php

namespace LibraFireProject\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'current-password' => 'required|min:5',
            'new-password' => 'required|min:5',
            'new-password-repeat' => 'required|min:5'
        ];
    }

    /**
     * Password update validation messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'current-password.required' => 'Current Password can not be empty.',
            'current-password.min' => 'Current Password must have at least 5 characters.',
            'new-password.required' => 'New Password can not be empty.',
            'new-password.min' => 'New Password must have at least 5 characters.',
            'new-password-repeat.required' => 'Password Repeat can not be empty.',
            'new-password-repeat.min' => 'Password Repeat must have at least 5 characters.'
        ];
    }
}
