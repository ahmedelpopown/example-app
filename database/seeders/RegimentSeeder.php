<?php

namespace Database\Seeders;

use App\Models\Regiment;
use App\Models\Soldier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegimentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regiments = Regiment::all();

        // أنشئ 20 جندي
        Soldier::factory(20)->create()->each(function ($soldier, $index) use ($regiments) {
            // وزع الجنود على الفرق بالتناوب
            $regiment = $regiments[$index % $regiments->count()];
            $soldier->regiment()->associate($regiment)->save();
        });
    }
}
