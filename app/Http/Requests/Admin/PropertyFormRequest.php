<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
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
            //
            'title'=>['required','min:5'],
            'description'=>['required','min:5'],
            'surface'=>['required','integer','min:3'],
            'rooms'=>['required','integer','min:1'],
            'floor'=>['required','integer','min:1'],
            'bedrooms'=>['required','integer','min:0'],
            'price'=>['required','integer','min:0'],
            'city'=>['required','min:5'],
            'address'=>['required','min:5'],
            'postal_code'=>['required','min:3'],
            'sold'=>['required','boolean'],
        ];
    }
}
