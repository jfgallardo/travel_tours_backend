<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisponibilidadeMultiplaRequest extends FormRequest
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
            'ApenasVoosComBagagem' => 'nullable',
            'ApenasVoosDiretos' => 'nullable',
            'BuscarVoosComBagagem' => 'nullable',
            'BuscarVoosSemBagagem' => 'nullable',
            'Cabine' => 'string|nullable',
            'DataIda' => 'nullable|string',
            'Destino' => 'nullable|string|max:3',
            'Flex' => 'nullable',
            'MultiplosTrechos' => 'nullable|array',
            'CompanhiasPreferenciais' => 'nullable|array',
            'Origem' => 'nullable|string|max:3',
            'QuantidadeAdultos' => 'required|integer',
            'QuantidadeBebes' => 'required|integer',
            'QuantidadeCriancas' => 'required|integer',
            'Recomendacao' => 'nullable',
            'Sistema' => 'nullable|integer',
            'QuantidadeDeVoos' => 'nullable|integer',
            'MultiplosTrechos' => 'required|array' 
        ];
    }
}
