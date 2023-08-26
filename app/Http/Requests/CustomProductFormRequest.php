<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomProductFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            'category_id' => [
                // 'required',
                'integer'
            ],
            'name' => [
                // 'required',
                'string'
            ],

            'slug' => [
                // 'required',
                'string'
            ],

            'description' => [
                // 'required',
                'string'
            ],

            'price' => [
                // 'required',
                'integer'
            ],

            'quantity' => [
                // 'required',
                'integer'
            ],


            'image' => [
                'nullable',
            //    'image|mimes:jpeg,png,jpg'
            ],
        ];
    }
}
