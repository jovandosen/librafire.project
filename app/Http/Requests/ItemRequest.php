<?php

namespace LibraFireProject\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'description' => 'required',
            'price' => 'required|numeric',
            'payment' => 'required',
            'delivery' => 'required'
        ];
    }

    /**
     * Item validation messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name can not be empty.',
            'description.required' => 'Description can not be empty.',
            'price.required' => 'Price can not be empty.',
            'price.numeric' => 'Price must be a number.',
            'payment.required' => 'Payment can not be empty.',
            'delivery.required' => 'Delivery can not be empty.'
        ];
    }
}
