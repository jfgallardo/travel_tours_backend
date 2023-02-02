<?php

namespace App\Services\Wooba;

use Illuminate\Support\Facades\Http;

class AutenticarWoobaService
{
    private $token;
    private $headers;

    public function autenticar()
    {
        if ($this->token) return;

        $body = [
            'login' => env('LOGIN_WCF'),
            'senha' => env('SENHA_WCF')
        ];

        $headers = [
            'Content-Type' => 'application/json',
            'developer-token' => env('DEVELOPER_TOKEN'),
            'developer-access-code' => $this->encrypt_data()
        ];

        $this->setHeaders($headers);

        $response = Http::withHeaders($this->headers)
        ->post(env('AUTENTICAR'), $body);

        $this->setToken($response->json());
    }
    

    /**
     ** Asigna los headers para realizar la peticion al Web Service.
     *
     * @param array $value
     * @return self
     */
    public function setHeaders(array $value): self
    {
        $this->headers = $value;
        return $this;
    }

    /**
     ** Asigna el token al cliente. Token que sera enviado en todas las peticiones.
     *
     * @param string $value
     * @return self
     */
    public function setToken(string $value): self
    {
        $this->token = $value;
        return $this;
    }

/**
 * Retorna Token 
 *
 * @return $token
 */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Retorna headers para servicio Wooba
     *
     * @return $headers
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Retorna datos para accesar a servicio wooba
     *
     * @return array
     */
    public function accessToWooba()
    {
       return [
            "Login" => env('LOGIN_WCF'),
            "Senha" => env('SENHA_WCF'),
            "Token" => $this->getToken()
        ];
    }

    /**
     ** Elimina la conexion abierta por el cliente.
     *
     * @return void
     */
    public function desconectar()
    {
        Http::retry(3, 100)->withHeaders($this->headers)->post(env('DESCONECTAR'));
    }

    private function encrypt_data()
    {
        $current_date = date("d/m/Y");
        $binary_data = env('BINARY_DATA');
        $encry = strval($binary_data)  . '|' . $current_date;
        $public_key = openssl_pkey_get_public(file_get_contents('public_key.pem'));
        openssl_public_encrypt($encry, $data_, $public_key);
        return base64_encode($data_);
    }
}