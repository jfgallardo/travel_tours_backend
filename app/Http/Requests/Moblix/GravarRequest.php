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
            "Email" => "required|string",
            "Passageiros" => "required|array",
            "Ida" => "array|required",
            "pagante" => "array|nullable",
            "TokenConsultaIda" => "string|required",
            "IdMeioPagamento" => "integer|nullable",
            "ValorParcelaPS" => "numeric|required"
        ];
    }
}
