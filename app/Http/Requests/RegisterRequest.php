<?php

namespace LibraFireProject\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'first-name' => 'required|min:3',
            'last-name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5'
        ];
    }

    /**
     * Validation messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first-name.required' => 'First Name can not be empty.',
            'first-name.min' => 'First Name must have at least 3 characters.',
            'last-name.required' => 'Last Name can not be empty.',
            'last-name.min' => 'Last Name must have at least 3 characters.',
            'email.required' => 'Email can not be empty.',
            'email.email' => 'Email address is not valid.',
            'email.unique' => 'Email already exists.',
            'password.required' => 'Password can not be empty.',
            'password.min' => 'Password must have at least 5 characters.'
        ];
    }
}
