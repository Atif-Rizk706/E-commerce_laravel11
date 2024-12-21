<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

        public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|numeric',
        ];
    }
        public function messages()
    {
        return [
            'name.required' => 'receiver name is required.',
            'address.required' => 'receiver address is required.',
            'phone.required' => 'receiver phone is required.',
            'phone.numeric'=>'phone must be numeric'
        ];
    }

}
