<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetalhesdeFamiliaRequest extends FormRequest
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
            'Companhia' => 'required|string',
            'FamiliaCodigo' => 'required|string',
            'Flex' => 'required|boolean',
            'Rota' => 'string|nullable',
            'Sistema' => 'numeric',
            'ViagensMultiplas' => 'array|nullable',
        ];
    }
}
