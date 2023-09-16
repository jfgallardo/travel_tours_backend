<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservarRequest extends FormRequest
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
            'CentroDeCusto' => 'nullable|array',
            'ChaveDeSeguranca' => 'string|nullable',
            'CobrancaDeServico' => 'nullable|array',
            'CobrancaDeServico.CartaoDeCredito' => 'nullable|array',
            'Departamento' => 'string|nullable',
            'InformacoesComplementaresPassageiro' => 'nullable|array',
            'Matricula' => 'string|nullable',
            'Pagamento' => 'required|array',
            'Pagamento.CartaoDeCredito' => 'required|array',
            'Requisicao' => 'nullable|string',
            'Solicitante' => 'nullable|string',
            'TokenDeSeguranca' => 'nullable|string',
            'TourCode' => 'nullable|integer',
            'TourCodeManual' => 'string|nullable',
            'TourCodeManualComissao' => 'nullable|integer',
            'UnidadeDeNegocioId' => 'nullable|integer',
            'ValidarAnaliseRisco' => 'nullable|boolean',
            'ClassesSelecionadas' => 'nullable|array',
            'Contatos' => 'nullable|array',
            'DadosPedido' => 'nullable|array',
            'HabilitarFluxoContatoPassageiro' => 'nullable|boolean',
            'IdentificacaoDaViagem' => 'required|string',
            'IdentificacaoDaViagemVolta' => 'nullable|string',
            'Passageiros' => 'required|array',
            'RetornarDadosSessao' => 'nullable|boolean',
            'TarifarMelhorFamilia' => 'nullable|boolean',
            'TarifarMelhorPreco'=> 'nullable|boolean',
            'ViagensMultiplas' => 'nullable|array',
        ];
    }
}
