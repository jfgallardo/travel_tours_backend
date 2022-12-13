<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelSearchMoblixRequest extends FormRequest
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
            'IdLocation' => 'required|string',
            'Checkin' => 'required|string',
            'Checkout' => 'required|string',
            'Rooms' => 'required',
            'IdProvider' => 'required|numeric',
            'NationalityLeaderPax' => 'required|string'
        ];
    }
}
