<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'name' => 'Dr. ' . $this->faker->name(),
            'biography' => $this->faker->paragraph(),
            'is_active' => $this->faker->boolean(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'section_id' => \App\Models\Section::factory()->create()->id,
            'schedule_from' => $this->faker->time(),
            'schedule_to' => $this->faker->time(),
            'created_at' => now(),
        ];
    }
}
