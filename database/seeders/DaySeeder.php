<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = [
            ['key' => 'saturday', 'en' => 'Saturday', 'ar' => 'السبت'],
            ['key' => 'sunday', 'en' => 'Sunday', 'ar' => 'الأحد'],
            ['key' => 'monday', 'en' => 'Monday', 'ar' => 'الاثنين'],
            ['key' => 'tuesday', 'en' => 'Tuesday', 'ar' => 'الثلاثاء'],
            ['key' => 'wednesday', 'en' => 'Wednesday', 'ar' => 'الأربعاء'],
            ['key' => 'thursday', 'en' => 'Thursday', 'ar' => 'الخميس'],
            ['key' => 'friday', 'en' => 'Friday', 'ar' => 'الجمعة'],
        ];

        foreach ($days as $dayData) {
            $day = Day::create([
                'key' => $dayData['key'],
            ]);

            foreach (['en', 'ar'] as $locale) {
                $day->translateOrNew($locale)->name = $dayData[$locale];
            }
            $day->save();
        }
    }
}
