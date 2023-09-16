<?php

namespace App\Http\Requests\Moblix;

use Illuminate\Foundation\Http\FormRequest;

class ListarRequest extends FormRequest
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
            'PageSize' => 'nullable|integer',
            'PageNumber' => 'nullable|integer',
            'OrderBy' => 'nullable|string',
            'Id' => 'nullable|string',
            'IdCliente' => 'nullable|integer',
            'IdUsuario' => 'nullable|integer',
            'IdStatus' => 'nullable|integer',
            'IdParceiro' => 'nullable|integer',
            'IdExterno' => 'nullable|integer',
            'DataInicio' => 'nullable|string',
            'DataFim' => 'nullable|string',
            'IdStatusPagamentoPagSeguro' => 'nullable|integer',
            'OrderDesc' => 'nullable|boolean',
        ];
    }
}
