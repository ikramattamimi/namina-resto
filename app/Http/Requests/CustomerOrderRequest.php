<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerOrderRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'customer-name' => 'required|string|min:3|max:255',
            'customer-phone' => 'required|string|min:10|max:15',
            'customer-address' => 'required|string|min:10|max:255',
            'customer-payment' => 'required|string|in:1,2',
            'customer-message' => 'nullable|string|min:10|max:255',
        ];
    }
}
