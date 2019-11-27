<?php

namespace LibraFireProject\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'first-name-profile' => 'required|min:3',
            'last-name-profile' => 'required|min:3',
            'email-profile' => 'required|email'
        ];
    }

    /**
     * Profile validation messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first-name-profile.required' => 'First Name can not be empty.',
            'first-name-profile.min' => 'First Name must have at least 3 characters.',
            'last-name-profile.required' => 'Last Name can not be empty.',
            'last-name-profile.min' => 'Last Name must have at least 3 characters.',
            'email-profile.required' => 'Email can not be empty.',
            'email-profile.email' => 'Email address is not valid.'
        ];
    }
}
