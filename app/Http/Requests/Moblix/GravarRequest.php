<?php

namespace App\Http\Requests\Moblix;

use Illuminate\Foundation\Http\FormRequest;

class GravarRequest extends FormRequest
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
            "Adultos" => "required|integer",
            "Criancas" => "required|integer",
            "Bebes" => "required|integer",
            "IdCliente" => "required|integer",
            "IdStatus" => "required|integer",
            "IdMeioPagamento" => "required|integer",
            "IdPedidoTipo" => "required|integer",
            "IdStatusPagamento" => "required|integer",
            "Passageiro" => "nullable|array",
            "Parcelas" => "nullable|integer",
            "Viagem" => "required|array",
            "Observacoes" => "nullable|string"
        ];
    }
}