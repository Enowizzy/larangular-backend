<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            "name" => "required",
            "category_id" => "required",
            "sub_category_id" => "required",
            "brand_id" => "required",
            "description" => "required|max:255",
            "quantity" => "required|min:1",
            "cost" => "required",
            "price" => "required",
            'images.*' => 'mimes:jpg,jpeg,png|max:5000',
            // 'images' => 'min:3',
        ];
    }
}
