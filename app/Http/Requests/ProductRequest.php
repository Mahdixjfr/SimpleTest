<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:4', 'max:25'],
            'price' => ['required', 'string', 'min:4', 'max:9'],
            'inventory' => ['required', 'numeric', 'min:50', 'max:500'],
            'description' => ['required', 'string', 'min:10', 'max:200'],
            'photo' => ['required', 'mimes:jpeg,png,jpg,gif', 'image'],
        ];
    }
}
