<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DisponibilidadeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'Exception' => $this->collection['Exception'],
            'Cia' => $this->collection['Cia'],
            'ViagensTrecho1' => $this->collection['ViagensTrecho1'],
            'ViagensTrecho2' => $this->collection['ViagensTrecho2'],
            'DataIda' => $this->collection['DataIda'],
            'DataVolta' => $this->collection['DataVolta'],
            'QntdAdulto' => $this->collection['QuantidadeAdultos'],
            'QntdCrianca' => $this->collection['QuantidadeCriancas'],
            'QntdBebe' => $this->collection['QuantidadeBebes'],
            'Recomendacoes' => $this->collection['Recomendacoes'],
            'MultiplosTrechos' => $this->collection['ViagensMultiplosTrechos'],
            'OfertasDesde' => $this->collection['ofertasDesde'],
            'AirportsIataTrecho1' => $this->getAllAirport1(),
            'AirportsIataTrecho2' => $this->getAllAirport2(),
        ];
    }

    private function getAllAirport1(){
        $travels = $this->collection['ViagensTrecho1'] ?? [];
        $airports = [];
        foreach ($travels as $value) {
            foreach ($value["Voos"] as $voo) {
            array_push($airports, $voo["Origem"]["CodigoIata"]);
            array_push($airports, $voo["Destino"]["CodigoIata"]);
            }
        }

        return array_unique($airports);
    }

    private function getAllAirport2(){
        $travels = $this->collection['ViagensTrecho2'] ?? [];
        $airports = [];
        foreach ($travels as $value) {
            foreach ($value["Voos"] as $voo) {
            array_push($airports, $voo["Origem"]["CodigoIata"]);
            array_push($airports, $voo["Destino"]["CodigoIata"]);
            }
        }

        return array_unique($airports);
    }
}
