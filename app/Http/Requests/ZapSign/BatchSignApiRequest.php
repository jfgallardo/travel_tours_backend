<?php

namespace App\Http\Requests\ZapSign;

use Illuminate\Foundation\Http\FormRequest;

class BatchSignApiRequest extends FormRequest
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
            'signer_tokens' => 'required|array',
            'user_token' => 'nullable|string',
        ];
    }
}
