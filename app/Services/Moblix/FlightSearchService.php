<?php

namespace App\Services\Moblix;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;

class FlightSearchService
{

    function __construct(private AuthService $authService)
    {
        $authService->autenticar();
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->authService->getToken()
        ];
        $this->authService->setHeaders($headers);
    }
    public function fligthSearch(array $data, string $filter)
    {
        $response = Http::withHeaders($this->authService->getHeaders())->post(env('DISPONIBILIDADE_MOBLIX'), $data);
        if ($response->json()['Erro']) {
            return [
                "Error" => $response->json()['Erro']
            ];
        }

        $tokenConsulta = $this->getValueToArray($response->json(), 'TokenConsulta');
        $adulto = $this->getValueToArray($response->json(), 'QntdAdulto');
        $crianca = $this->getValueToArray($response->json(), 'QntdCrianca');
        $bebe = $this->getValueToArray($response->json(), 'QntdBebe');
        $companhia = $this->getValueToArray($response->json(), 'Companhia');
        $ida = $this->getVooIda($response->json());
        $ida->sortBy($filter);
        $volta = $this->getVooVolta($response->json());
        $volta->sortBy($filter);
        $companhiaVolta = $this->getValueToArray($response->json(), 'CompanhiaVolta');
        $multas = $this->getValueToArray($response->json(), 'Multas');
        $areoportos = $this->getValueToArray($response->json(), 'Aeroportos');
        $pagante = $this->getValueToArray($response->json(), 'Pagante');
        $request = $this->getValueToArray($response->json(), 'Request');
        $starAlliance = $this->getValueToArray($response->json(), 'IsStarAlliance');

        return [
            "TokenConsulta" => $tokenConsulta,
            "QntdAdulto" => $adulto,
            "QntdCrianca" => $crianca,
            "QntdBebe" => $bebe,
            "Ida" => $ida->values()->all(),
            "Volta" => $volta->values()->all(),
            "IdaVolta" => null,
            "MultiplesTrechos" => null,
            "Companhia" => $companhia,
            "CompanhiaVolta" => $companhiaVolta,
            "Multas" => $multas,
            "Aeroportos" => $areoportos,
            "Pagante" => $pagante,
            "Request" => $request,
            "IsStarAlliance" => $starAlliance,
            "Platform" => 1
        ];
    }

    private function getVooIda(array $result)
    {
        $items = $result['Data'][0]['Ida'];
        $collection = new Collection();

        foreach ($items as $value) {
            $collection->push((object)[$value]);
        }

        return $collection;
    }

    private function getVooVolta(array $result)
    {
        $items = $result['Data'][0]['Volta'];
        $collection = new Collection();

        foreach ($items as $value) {
            $collection->push((object)[$value]);
        }

        return $collection;
    }

    private function getValueToArray(array $result, string $value)
    {
        return $result['Data'][0][$value];
    }
}
