<?php

namespace App\Services\Moblix;

use Illuminate\Support\Facades\Http;

class AuthService
{
    private $headers;
    private $token;

    public function autenticar()
    {
        if ($this->token) {
            return;
        }

        $headers = [
            'Origin' => 'externo',
        ];

        $this->setHeaders($headers);

        $body = [
            'grant_type' => 'password',
            'username' => env('USERNAME_MOBLIX'),
            'password' => env('PASSWORD_MOBLIX'),
        ];
        $response = Http::asForm()->withHeaders($this->headers)->post(env('AUTENTICAR_MOBLIX'), $body);

        $this->setToken($response->json()['access_token']);
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

    public function getHeaders()
    {
        return $this->headers;
    }
}
