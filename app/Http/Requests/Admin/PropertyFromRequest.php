<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFromRequest extends FormRequest
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
            'title'=>['required', 'min:4'],
            'description'=>['required', 'min:4'],
            'surface'=>['required','integer', 'min:10'],
            'rooms'=>['required','integer', 'min:1'],
            'bedrooms'=>['required','integer', 'min:0'],
            'floor'=>['required','integer', 'min:0'],
            'price'=>['required','integer', 'min:0'],
            'city'=>['required', 'min:4'],
            'adress'=>['required', 'min:4'],
            'postal_code'=>['required', 'min:4'],
            'sold'=>['required', 'boolean'],
            'options'=>['array', 'exists:options,id', 'required'],
            'pictures'=>['array'],
            'picture.*'=>['image', 'max:2000']
        ];
    }
}
