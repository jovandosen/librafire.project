<?php

namespace LibraFireProject\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:5'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email can not be empty.',
            'email.email' => 'Email address is not valid.',
            'password.required' => 'Password can not be empty.',
            'password.min' => 'Password must have at least 5 characters.'
        ];
    }
}
