<?php

namespace App\Services;

use App\Exceptions\EmptyFieldException;
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

    public function hotelAutoComplete(array $data) {
        $response = Http::withoutVerifying()->withHeaders($this->headers)->get('https://hotels-api.moblix.com.br/api/AutocompleteLocation?Query='.$data['Query'].'&IdProvider='.$data['IdProvider']);
        return $response->json();
    }

    public function hotelAvailable(array $data)
    {
        $response = Http::withoutVerifying()->withHeaders($this->headers)->get('https://hotels-api.moblix.com.br/api/Availability', [
            "IdLocation" => $data["IdLocation"],
            "Checkin" => $data["Checkin"],
            "Checkout" => $data["Checkout"],
            "Rooms" => json_encode($data["Rooms"]),
            "IdProvider" => $data["IdProvider"],
            "NationalityLeaderPax" => $data["NationalityLeaderPax"]
        ]);
        return $response->json();
    }

    public function hotelInformation(array $data)
    {
        $response = Http::withoutVerifying()->withHeaders($this->headers)->get('https://hotels-api.moblix.com.br/api/HotelInformation', [
            "HotelSearchCode" => $data["HotelSearchCode"],
            "IdProvider" => $data["IdProvider"],
            "Language" => $data["Language"]
        ]);
        return $response->json();
    }

    public function searchByIatabyCityAndAirport(string $data)
    {
        $response = Http::withHeaders($this->headers)->post("https://api.moblix.com.br/api/ConsultaAereo/Aeroportos?filtro=".$data);
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
