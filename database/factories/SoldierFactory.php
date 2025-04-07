<?php

namespace Database\Factories;

use App\Models\Regiment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Soldier>
 */
class SoldierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             
                'name' => $this->faker->name,
                'police_number' => $this->faker->unique()->numerify('PN#####'),
                'national_id' => $this->faker->unique()->numerify('##############'),
                'date_of_conscription' => $this->faker->date(),
                'discharge_from_conscription' => $this->faker->date(),
                'governorate' => $this->faker->city,
                'phone_number' => $this->faker->phoneNumber,
                'medical_condition' => $this->faker->randomElement(['سليم', 'مصاب', 'مزمن']),
                'confidentiality' => $this->faker->randomElement(['عادي', 'سري', 'سري جداً']),
               
                'job' => $this->faker->jobTitle,
               'authority' => $this->faker->jobTitle,
           'status' => 'working',
                'notes' => $this->faker->optional()->sentence,
                'special_case' => $this->faker->boolean,
'endLeave' => Carbon::create(2025, 4, 1)->format('Y-m-d'),

                 'start_date' => Carbon::createFromFormat('Y-m-d', '2025-04-01'),
                'work_start_date' => Carbon::now()->subDays(rand(0, 30)),
                 'regiment_id' => Regiment::factory(), // يعمل فوج تلقائي لكل جندي

        ];
    }
}
