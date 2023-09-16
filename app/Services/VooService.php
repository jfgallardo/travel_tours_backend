<?php

namespace App\Services;

use App\Services\Moblix\FlightSearchService;

class VooService
{
    public function __construct(private FlightSearchService $flightMoblix)
    {
    }

    public function roundTripAll(array $data)
    {
        $dataWooba = [];

        $dataMoblix = [
            'Origem' => $data['Origem'],
            'Destino' => $data['Destino'],
            'Ida' => $data['Ida'],
            'Adultos' => $data['Adultos'],
            'Criancas' => $data['Criancas'],
            'Bebes' => $data['Bebes'],
            'Companhia' => $data['Companhia'],
            'Cabine' => $data['Cabine'],
        ];

        if (array_key_exists('Volta', $data)) {
            $dataMoblix['Volta'] = $data['Volta'];
        }

        return $this->flightMoblix->flightSearch($dataMoblix);
    }
}
