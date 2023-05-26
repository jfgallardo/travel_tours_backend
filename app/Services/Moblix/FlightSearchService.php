<?php

namespace App\Services\Moblix;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

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
        $response = Http::timeout(60)->withHeaders($this->authService->getHeaders())->post(env('DISPONIBILIDADE_MOBLIX'), $data);
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
        $volta = $this->getVooVolta($response->json());
        $companhiaVolta = $this->getValueToArray($response->json(), 'CompanhiaVolta');
        $multas = $this->getValueToArray($response->json(), 'Multas');
        $areoportos = $this->getValueToArray($response->json(), 'Aeroportos');
        $pagante = $this->getValueToArray($response->json(), 'Pagante');
        $request = $this->getValueToArray($response->json(), 'Request');
        $starAlliance = $this->getValueToArray($response->json(), 'IsStarAlliance');

        if ($ida) {
            foreach ($ida as $value) {
                $value['Platform'] = 1;
                Redis::set($value["Token"], json_encode($value));
                Redis::expire($value["Token"], 1800);
            }
        }

        if ($volta) {
            foreach ($volta as $value) {
                $value['Platform'] = 1;
                Redis::set($value["Token"], json_encode($value));
                Redis::expire($value["Token"], 1800);
            }
        }

        return [
            "TokenConsulta" => $tokenConsulta,
            "QntdAdulto" => $adulto,
            "QntdCrianca" => $crianca,
            "QntdBebe" => $bebe,
            "Ida" => $ida,
            "Volta" => $volta,
            "IdaVolta" => null,
            "MultiplesTrechos" => null,
            "Companhia" => $companhia,
            "CompanhiaVolta" => $companhiaVolta,
            "Multas" => $multas,
            "Aeroportos" => $areoportos ?: $this->getAirportsIata($ida, $volta),
            "Pagante" => $pagante,
            "Request" => $request,
            "IsStarAlliance" => $starAlliance,
            "Platform" => 1
        ];
    }

    private function getVooIda(array $result)
    {
        $voo = $result['Data'][0]['Ida'];

        if (isset($voo)) {
            foreach ($voo as &$value) {
                $value['Token'] = Str::random(60);
            }
            return $voo;
        }
        return [];
    }

    private function getVooVolta(array $result)
    {
        $voo = $result['Data'][0]['Volta'];

        if (isset($voo)) {
            foreach ($voo as &$value) {
                $value['Token'] = Str::random(60);
            }
            return $voo;
        }

        return [];
    }

    private function getValueToArray(array $result, string $value)
    {
        return $result['Data'][0][$value];
    }

    private function getAirportsIata($v_one, $v_two)
    {
        $iatas = array();
        if (!$v_one && !$v_two) return array();

        foreach ($v_one as $voo) {
            foreach ($voo['Voos'] as $item) {
                if (!in_array($item['Destino'], $iatas)) array_push($iatas, $item['Destino']);
                if (!in_array($item['Origem'], $iatas)) array_push($iatas, $item['Origem']);
            }
        }

        if (is_array($v_two) && count($v_two) > 0) {
            foreach ($v_two as $voo) {
                foreach ($voo['Voos'] as $item) {
                    if (!in_array($item['Destino'], $iatas)) array_push($iatas, $item['Destino']);
                    if (!in_array($item['Origem'], $iatas)) array_push($iatas, $item['Origem']);
                }
            }
        }

        return $iatas;
    }
}
