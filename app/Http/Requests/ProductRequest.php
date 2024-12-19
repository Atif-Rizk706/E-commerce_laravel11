<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Product title is required.',
            'description.required' => 'Product description is required.',
            'image.required' => 'An image is required for the product.',
            'price.required' => 'Product price is required.',
            'category.required' => 'Category is required.',
            'quantity.required' => 'Quantity must be at least 1.',
        ];
    }
}
