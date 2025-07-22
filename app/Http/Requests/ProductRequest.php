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
            'product_name' => 'required',
            'product_description' => 'nullable|min:5|max:255',
            'category_id' => 'required',
            'quantity' => 'required|numeric|min:1',
            'price' => 'required|min:1',
        ];
    }

    public function message(): array
    {
        return [
            'category_id.required' => 'Category field is required',
        ];
    }
}
