<?php

namespace App\Services;

use App\Exceptions\InvalidDateOutException;
use App\Exceptions\InvalidIataException;
use Illuminate\Support\Facades\Http;
use App\Services\ConnectionMoblixService;
use DateTime;

class MoblixService extends ConnectionMoblixService
{

    public function autenticar()
    {
        if ($this->token) return;

        $headers = [
            'Origin' => 'externo'
        ];

        $this->setHeaders($headers);

        $body = [
            'grant_type' => 'password',
            'username' => env('USERNAME_MOBLIX'),
            'password' => env('PASSWORD_MOBLIX')
        ];
        $response = Http::asForm()->withHeaders($this->headers)->post('https://api.moblix.com.br/api/Token', $body);

        $this->setToken($response->json()['access_token']);
    }

    public function queryFlight(string $source, string $destiny, string $departure_date, string $return_date, array $data)
    {
        $departure = new DateTime($departure_date);
        $return_d = new DateTime($return_date);
        
        if (strlen($source) != 3 || strlen($destiny) != 3) {
            throw new InvalidIataException();
        }

        if ($departure > $return_d) {
            throw new InvalidDateOutException();
        }

        $body = [
            'Origem' => $source,
            'Destino' => $destiny,
            'Ida' => $departure_date,
            'Volta' => $return_date,
            'Adultos' => $data['adults'],
            'Criancas' => $data['childrens'],
            'Bebes' => $data['bebes'],
            'Companhia' => $data['company']
        ];


        $response = Http::withHeaders($this->headers)->post('https://api.moblix.com.br/api/ConsultaAereo/Consultar', $body);
        return $response->json();
    }




    public function setHeaders(array $value): self
    {
        $this->headers = $value;
        return $this;
    }

    public function setToken(string $value): self
    {
        $this->token = $value;
        return $this;
    }

    public function getToken()
    {
        return $this->token;
    }
}
