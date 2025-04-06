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
        Regiment::factory(10)->create();
        $regiments = Regiment::all();

        if ($regiments->count() == 0) {
            throw new \Exception('لا يوجد سرايا في قاعدة البيانات. من فضلك شغّل RegimentSeeder أولاً.');
        }
        
        Soldier::factory(10)->create()->each(function ($soldier, $index) use ($regiments) {
            $regiment = $regiments[$index % $regiments->count()];
            $soldier->regiment()->associate($regiment);
            $soldier->save();
        });
    }
}
