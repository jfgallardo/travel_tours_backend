<?php

namespace App\Http\Requests\Moblix;

use Illuminate\Foundation\Http\FormRequest;

class GravarPfRequest extends FormRequest
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
            "Tipo" => "required|integer",
            "IdPermissao" => "required|integer",
            "Nome" => "required|string",
            "Email" => "required|email",
            "Cpf" => "required|string",
            "Sexo" => "required|string",
            "Nascimento" => "required|date",
            "Senha" => "required|string",
            "ConfirmaSenha" => "required|string",
            "Ativo" => "required|boolean",
            "Endereco" => "required|array",
            "Contato" => "required|array"     
        ];
    }
}
