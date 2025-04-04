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
           // أنشئ فوج
    $regiment = Regiment::factory()->create();

    // أنشئ جنود مرتبطين بهذا الفوج
    Soldier::factory(10)->create([
        'regiment_id' => $regiment->id,
    ]);
    }
}
