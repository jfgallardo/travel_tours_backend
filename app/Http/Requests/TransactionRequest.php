<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'amount' => 'required|numeric',
            'installments' => 'required|numeric',
            'payment_method' => 'required|string',
            'async' => 'nullable|boolean',
            'card_hash' => 'nullable|string',
            'customer' => 'required|array',
            'billing' => 'required|array',
            'items' => 'nullable|array',
        ];
    }
}
