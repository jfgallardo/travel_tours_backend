<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class WobbaCollection extends ResourceCollection
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
            'ViagensTrecho1' => $this->collection['ViagensTrecho1'],
            'ViagensTrecho2' => $this->collection['ViagensTrecho2'],
            'DataIda' => $this->collection['DataIda'],
            'DataVolta' => $this->collection['DataVolta'],
            'QntdAdulto' => $this->collection['QuantidadeAdultos'],
            'QntdCrianca' => $this->collection['QuantidadeCriancas'],
            'QntdBebe' => $this->collection['QuantidadeBebes'],
            'Recomendacoes' => $this->collection['Recomendacoes'],
        ];
    }
}
