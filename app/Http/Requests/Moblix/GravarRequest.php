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
            'ida' => 'array|required',
            'ida.Email' => 'required|string',
            'ida.Passageiros' => 'required|array',
            'ida.Ida' => 'array|required',
            'ida.pagante' => 'array|nullable',
            'ida.TokenConsultaIda' => 'string|required',
            'ida.IdMeioPagamento' => 'integer|nullable',
            'ida.ValorParcelaPS' => 'numeric|required',

            'volta' => 'array|nullable',
            'volta.Email' => 'sometimes|required|required_if:volta,!=,null|string',
            'volta.Passageiros' => 'sometimes|required|required_if:volta,!=,null|array',
            'volta.Ida' => 'array|sometimes|required|required_if:volta,!=,null',
            'volta.pagante' => 'array|nullable',
            'volta.TokenConsultaIda' => 'string|sometimes|required|required_if:volta,!=,null',
            'volta.IdMeioPagamento' => 'integer|nullable',
            'volta.ValorParcelaPS' => 'numeric|sometimes|required|required_if:volta,!=,null',
        ];
    }
}
