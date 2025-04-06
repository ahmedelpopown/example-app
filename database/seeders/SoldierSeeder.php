<?php

namespace Database\Seeders;

use App\Models\Regiment;
use App\Models\Soldier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoldierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
        $regiments = Regiment::all();

        if ($regiments->count() === 0) {
            throw new \Exception('يجب إنشاء السرايا أولاً قبل إنشاء الجنود.');
        }
    
        // إنشاء 3000 جندي وتوزيعهم على 10 سرايا
        Soldier::factory(100)->create()->each(function ($soldier, $index) use ($regiments) {
            $regiment = $regiments[$index % $regiments->count()];
            $soldier->regiment()->associate($regiment)->save();
        });
    }
}
