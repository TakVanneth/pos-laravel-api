<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            "product_name" => "required|string|max:255",
            "image_url" => "required|string|max:65535", // Adjusting max length for text field
            "category_id" => "required|integer|exists:categories,id",
            "supplier_id" => "required|integer|exists:suppliers,id",
            "unit_price" => "required|numeric|min:0",
            "stock_quantity" => "required|integer|min:0",
        ];
    }
}
