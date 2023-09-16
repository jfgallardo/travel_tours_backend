<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchFlightRequest extends FormRequest
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
            'Origem' => 'required|string|size:3',
            'Destino' => 'required|string|size:3',
            'Ida' => 'required|date',
            'Volta' => 'required|date',
            'Adultos' => 'required|numeric',
            'Criancas' => 'nullable|numeric',
            'Bebes' => 'nullable|numeric',
            'Companhia' => 'nullable|numeric',
            'OrderBy' => 'nullable|string',
            'IsDesc' => 'nullable|boolean',
            'Cabine' => 'nullable',
        ];
    }
}
