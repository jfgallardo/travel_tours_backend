<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VooRequest extends FormRequest
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
            "Origem" => "required|size:3",
            "Destino" => "required|size:3",
            "Ida" => "required|date",
            "Volta" => "nullable|date",
            "Adultos" => "required|integer",
            "Criancas" => "required|integer",
            "Bebes" => "required|integer",
            "Companhia" => "nullable|array",
            "OrderBy" => "nullable|string",
            "IsDesc" => "nullable|boolean",
            "Cabine" => "nullable|string",
            "Flex" => "nullable|boolean",
            "Recomendacao" => "nullable|boolean",
            "ApenasVoosComBagagem" =>  "nullable|boolean",
            "ApenasVoosDiretos" => "nullable|boolean",
            "BuscarVoosComBagagem" => "nullable|boolean",
            "BuscarVoosSemBagagem" => "nullable|boolean"
        ];
    }
}
