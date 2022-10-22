<?php

namespace App\Services;

use App\Models\Aeroporto;
use Illuminate\Support\Facades\DB;

class AeroportoService
{
    public function searchByIatabyCityAndAirport($keyword)
    {
        $airport = DB::table('aeroportos')
            ->where('iata', 'like', $keyword . '%')
            ->orWhere('ciudade', 'like', $keyword . '%')
            ->limit(10)
            ->get();

        return $airport;
    }
}
