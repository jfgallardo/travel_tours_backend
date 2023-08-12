<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsaasClientRequest extends FormRequest
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

    /**  'body' => '{,"postalCode":"76420000","notificationDisabled":true}',
 */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required|string",
            "cpfCnpj" => "required|string",
            "email" => "nullable|email",
            "phone" => "nullable|string",
            "mobilePhone" => "nullable|string",
            "address" => "nullable|string",
            "addressNumber" => "nullable|string",
            "complement" => "nullable|string",
            "province" => "nullable|string",
            "postalCode" => "nullable|string",
            "notificationDisabled" => "nullable|boolean",
            "value" => "required|numeric"
        ];
    }
}
