<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetSearchRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'id' => ['required', 'numeric', 'exists:pets,id'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'id.required' => 'L\'Id és obligatori',
            'id.numeric' => 'L\'Id ha de ser un valor vàlid',
            'id.exists' => 'La mascota especificada no existeix a la base de dades',
        ];
    }
}
