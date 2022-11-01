<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MoblixCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = $this->collection['Data'][0];
        
        return [
            'totalItens' => $this->collection['TotalItens'],
            'TokenConsulta' => $data['TokenConsulta'],
            'Ida' => $data['Ida'],
            'Volta' => $data['Volta'],
            'QntdAdulto' => $data['QntdAdulto'],
            'QntdCrianca' => $data['QntdCrianca'],
            'QntdBebe' => $data['QntdBebe'],
        ];
    }
}
