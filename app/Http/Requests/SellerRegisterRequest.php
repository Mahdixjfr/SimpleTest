<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellerRegisterRequest extends FormRequest
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
            'store_name' => ['required', 'min:4', 'max:20', 'string'],
            'phone' => ['required', 'regex:/(09)[0-9]{9}/', 'unique:sellers'],
            'address' => ['required', 'min:10', 'max:150', 'string'],
            'category_id' => ['required']
        ];
    }
}
