<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'El nom és obligatori',
            'name.string' => 'El nom ha de ser una cadena de text',
            'name.max' => 'El nom no pot tenir més de 255 caràcters',
            'email.required' => 'L\'Email és obligatori',
            'email.email' => 'L\'Email ha de tenir un format vàlid (Ex: example@example.com)',
            'email.max' => 'L\'Email no pot tenir més de 255 caràcters',
            'email.unique' => 'Aquest email ja està registrat',
            'password.required' => 'La Contrasenya és obligatòria',
            'password.confirmed' => 'Les contrasenyes no coincideixen',
            'password.min' => 'La Contrasenya ha de tenir almenys 8 caràcters',
        ];
    }
}