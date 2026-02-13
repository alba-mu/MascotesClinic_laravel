<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoryStoreRequest extends FormRequest
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
            'mascota_id' => ['required', 'numeric', 'exists:pets,id'],
            'data' => ['required', 'date_format:Y-m-d', 'before_or_equal:today'],
            'motiu_visita' => ['required', 'string', 'max:255'],
            'descripcio' => ['nullable', 'string', 'max:1000'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'mascota_id.required' => 'L\'Id de la mascota és obligatori',
            'mascota_id.numeric' => 'L\'Id ha de ser un valor vàlid',
            'mascota_id.exists' => 'La mascota especificada no existeix a la base de dades',
            'data.required' => 'La data és obligatòria',
            'data.date_format' => 'La data ha de tenir format YYYY-MM-DD',
            'data.before_or_equal' => 'La data no pot ser futura',
            'motiu_visita.required' => 'El motiu és obligatori',
            'motiu_visita.max' => 'El motiu és massa llarg',
            'descripcio.max' => 'La descripció és massa llarga',
        ];
    }
}
