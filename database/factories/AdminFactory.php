<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'amir nagy',
            'email' => 'amirnagy886@gmail.com',
            'password' => bcrypt('password'), // Default password
            'phone' => '01017613635',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
