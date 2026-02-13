<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerUpdateRequest extends FormRequest
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
            'id' => ['required', 'numeric', 'exists:owners,id'],
            'email' => ['required', 'email', 'max:255'],
            'movil' => ['required', 'regex:/^[0-9]{9}$/'],
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
            'id.exists' => 'L\'Id no existeix',
            'email.required' => 'L\'email és obligatori',
            'email.email' => 'L\'email ha de ser un valor vàlid',
            'email.max' => 'L\'email és massa llarg',
            'movil.required' => 'El mòbil és obligatori',
            'movil.regex' => 'El mòbil ha de ser un valor vàlid (9 dígits)',
        ];
    }
}
