<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'طب القلب',
                'طب الأعصاب',
                'طب الأطفال',
                'جراحة العظام',
                'الأمراض الجلدية',
                'طب النساء',
                'الطب النفسي',
                'الأشعة',
            ]),
        ];
    }
}
