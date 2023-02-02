<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarifarRequest extends FormRequest
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
            'ClassesSelecionadas' => 'nullable|array',
            'IdentificacaoDaViagem' => 'required|string',
            'ViagemIda' => 'required|string',
            'ViagemVolta' => 'nullable|numeric',
            'ViagensMultiplas' => 'nullable|array',
            'RetornarPlanoDeFinanciamento' => 'nullable|boolean',
            'RetornarRegrasTarifarias' => 'nullable|boolean',
            'TarifarMelhorFamilia' => 'nullable|boolean',
            'TarifarMelhorPreco' => 'nullable|boolean',
        ];
    }
}
