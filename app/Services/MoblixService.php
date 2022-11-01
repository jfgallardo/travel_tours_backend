<?php

namespace App\Services;

use App\Exceptions\InvalidDateOutException;
use App\Exceptions\InvalidIataException;
use Illuminate\Support\Facades\Http;
use DateTime;

class MoblixService
{
    private $headers;
    private $token;

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

    public function queryFlight(array $data)
    {
        $response = Http::withHeaders($this->headers)->post('https://api.moblix.com.br/api/ConsultaAereo/Consultar', $data);
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
