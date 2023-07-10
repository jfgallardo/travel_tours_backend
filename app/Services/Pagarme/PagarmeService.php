<?php

namespace App\Services\Pagarme;

use Illuminate\Support\Facades\Http;
use PagarMe;

class PagarmeService
{
    public function ClientPagarMe()
    {
        return new PagarMe\Client(env('PAGAR_ME_KEY'));
    }

    public function Transaction()
    {
      /*  $body = [
            "api_key" => "ak_live_lGWfKOqKk8d59WN5DTEgbG8CJvkC1r",
            'amount' => 1000,
            'payment_method' => 'credit_card',
            'card_holder_name' => 'Anakin Skywalker',
            'card_cvv' => '123',
            'card_number' => '4242424242424242',
            'card_expiration_date' => '1220',
            'customer' => [
                'external_id' => '1',
                'name' => 'Nome do cliente',
                'type' => 'individual',
                'country' => 'br',
                'documents' => [
                    [
                        'type' => 'cpf',
                        'number' => '00000000000'
                    ]
                ],
                'phone_numbers' => ['+551199999999'],
                'email' => 'cliente@email.com'
            ],
            'billing' => [
                'name' => 'Nome do pagador',
                'address' => [
                    'country' => 'br',
                    'street' => 'Avenida Brigadeiro Faria Lima',
                    'street_number' => '1811',
                    'state' => 'sp',
                    'city' => 'Sao Paulo',
                    'neighborhood' => 'Jardim Paulistano',
                    'zipcode' => '01451001'
                ]
            ],
            'shipping' => [
                'name' => 'Nome de quem receberá o produto',
                'fee' => 1020,
                'delivery_date' => '2018-09-22',
                'expedited' => false,
                'address' => [
                    'country' => 'br',
                    'street' => 'Avenida Brigadeiro Faria Lima',
                    'street_number' => '1811',
                    'state' => 'sp',
                    'city' => 'Sao Paulo',
                    'neighborhood' => 'Jardim Paulistano',
                    'zipcode' => '01451001'
                ]
            ],
            'items' => [
                [
                    'id' => '1',
                    'title' => 'R2D2',
                    'unit_price' => 300,
                    'quantity' => 1,
                    'tangible' => true
                ],
                [
                    'id' => '2',
                    'title' => 'C-3PO',
                    'unit_price' => 700,
                    'quantity' => 1,
                    'tangible' => true
                ]
            ]
        ];
        $transaction = Http::post('https://api.pagar.me/1/transactions', $body);

        return $transaction;*/


        $url = 'https://api.pagar.me/1/transactions';
        $api_key = 'ak_live_lGWfKOqKk8d59WN5DTEgbG8CJvkC1r';

        $data = array(
            'api_key' => $api_key,
            'amount' => 21000,
            'card_number' => '4111111111111111',
            'card_cvv' => '123',
            'card_expiration_date' => '0830',
            'card_holder_name' => 'Morpheus Fishburne',
            'customer' => array(
                'external_id' => '#3311',
                'name' => 'Morpheus Fishburne',
                'type' => 'individual',
                'country' => 'br',
                'email' => 'mopheus@nabucodonozor.com',
                'documents' => array(
                    array(
                        'type' => 'cpf',
                        'number' => '30621143049'
                    )
                ),
                'phone_numbers' => array(
                    '+5511999998888',
                    '+5511888889999'
                ),
                'birthday' => '1965-01-01'
            ),
            'billing' => array(
                'name' => 'Trinity Moss',
                'address' => array(
                    'country' => 'br',
                    'state' => 'sp',
                    'city' => 'Cotia',
                    'neighborhood' => 'Rio Cotia',
                    'street' => 'Rua Matrix',
                    'street_number' => '9999',
                    'zipcode' => '06714360'
                )
            ),
            'shipping' => array(
                'name' => 'Neo Reeves',
                'fee' => 1000,
                'delivery_date' => '2000-12-21',
                'expedited' => true,
                'address' => array(
                    'country' => 'br',
                    'state' => 'sp',
                    'city' => 'Cotia',
                    'neighborhood' => 'Rio Cotia',
                    'street' => 'Rua Matrix',
                    'street_number' => '9999',
                    'zipcode' => '06714360'
                )
            ),
            'items' => array(
                array(
                    'id' => 'r123',
                    'title' => 'Red pill',
                    'unit_price' => 10000,
                    'quantity' => 1,
                    'tangible' => true
                ),
                array(
                    'id' => 'b123',
                    'title' => 'Blue pill',
                    'unit_price' => 10000,
                    'quantity' => 1,
                    'tangible' => true
                )
            )
        );

        $data_string = json_encode($data);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ));

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;

    }
}
