<?php

namespace App\Services;

use App\Services\Moblix\FlightSearchService;

class VooService
{

    function __construct(private FlightSearchService $flightMoblix)
    {
    }

    public function roundTripAll(array $data)
    {
        $dataWooba = [];

        $dataMoblix = [
            'Origem' => $data['Origem'],
            'Destino' => $data['Destino'],
            'Ida' => $data['Ida'],
            'Volta' => $data['Volta'],
            'Adultos' => $data['Adultos'],
            'Criancas' => $data['Criancas'],
            'Bebes' => $data['Bebes'],
            'Companhia' => $data['Companhia'][0] ?? 1,
            'OrderBy' => $data['OrderBy'] ?? 'price',
            'IsDesc' => $data['IsDesc'] ?? false,
            'Cabine' => (int)$data['Cabine'] ?? -1,
            /* 'Pagante' => $data['Pagante'] ?? false */
        ];

        return $this->flightMoblix->fligthSearch($dataMoblix);
    }
}
