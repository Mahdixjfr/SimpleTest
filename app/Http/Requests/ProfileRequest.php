<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
            'name' => 'required|min:3|max:50',
            'phone' => ['required', 'regex:/(09)[0-9]{9}/', 'unique:users'],
            'address' => ['required', 'min:5', 'max:255'],
            'email' => [Rule::unique('users', 'email')->ignore($this->user), 'required', 'email'],
        ];
    }
}
