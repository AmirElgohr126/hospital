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
            'name' => $this->faker->name(),
            'biography' => $this->faker->paragraph(),
            'specialization' => $this->faker->randomElement(['Cardiology', 'Neurology', 'Pediatrics', 'Orthopedics', 'Dermatology']),
            'appointment_schedule' => $this->faker->time(),
            'profile_picture'=> $this->faker->imageUrl(640, 480, 'people', true, 'doctor', true),
            'is_active' => $this->faker->boolean(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),

        ];
    }
}
