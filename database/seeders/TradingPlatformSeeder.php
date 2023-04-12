<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TradingPlatform;

class TradingPlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TradingPlatform::factory()->create([
            'platform' => 'Moblix'
        ]);
        TradingPlatform::factory()->create([
            'platform' => 'Wooba'
        ]);
    }
}
