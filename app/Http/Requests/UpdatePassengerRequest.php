<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePassengerRequest extends FormRequest
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
            'name' => 'required|string',
            'last_name' => 'required|max:100',
            'email' => 'required|email',
            'date_birth' => 'required|date',
            'id_cpf' => 'required|max:20',
            'phone'  => 'required|max:50',
            'number_passport'  => 'required|max:50',
            'pass_validity' => 'required|date',
            'pass_issue' => 'required|date',
            'contry_issue' => 'required|max:50',
            'contry_residence' => 'required|max:50'
        ];
    }

     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Campo obrigatorio',
            'string' => 'Campo somente texto'
        ];
    }
}
