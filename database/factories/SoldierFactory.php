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
                'notes' => $this->faker->optional()->sentence,
                'special_case' => $this->faker->boolean,
                'start_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
                'work_start_date' => Carbon::now()->subDays(rand(0, 30)),
                'on_leave' => $this->faker->boolean(30),
                'regiment_id' => Regiment::factory(), // يعمل فوج تلقائي لكل جندي

        ];
    }
}
