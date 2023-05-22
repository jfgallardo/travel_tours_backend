<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterRequest extends FormRequest
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
            'typePerson' => 'required|string',
            'fullName' => 'required|string',
            'cpf' => 'required|string',
            'birthday' => 'required|string',
            'cep' => 'required|string',
            'bairro' => 'required|string',
            'address' => 'required|string',
            'estado' => 'required|string',
            'number' => 'nullable|string',
            'ciudade' => 'required|string',
            'complemento' => 'nullable|string',
            'mainPhone' => 'required|string',
            'alternativePhone' => 'nullable|string',
            'email' => 'required|email',
            'password' => 'required|string|min:8|max:30|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).+/'
        ];
    }
}
