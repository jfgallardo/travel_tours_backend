<?php

namespace Database\Seeders;

use App\Models\TradingPlatform;
use Illuminate\Database\Seeder;

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
            'platform' => 'Moblix',
        ]);
        TradingPlatform::factory()->create([
            'platform' => 'Wooba',
        ]);
    }
}
