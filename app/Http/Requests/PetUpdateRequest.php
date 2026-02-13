<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetUpdateRequest extends FormRequest
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
            'nom' => ['required', 'regex:/^[A-Za-zÀ-ÿ0-9 \'´`-]{1,150}$/', 'max:150'],
            'propietari_id' => ['required', 'numeric', 'exists:owners,id'],
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
            'id.exists' => 'La mascota no existeix',
            'nom.required' => 'El nom és obligatori',
            'nom.regex' => 'El nom ha de ser un valor vàlid',
            'nom.max' => 'El nom és massa llarg',
            'propietari_id.required' => 'El propietari és obligatori',
            'propietari_id.numeric' => 'El propietari ha de ser un valor vàlid',
            'propietari_id.exists' => 'El propietari no existeix',
        ];
    }
}
