<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{

    public function run(): void
    {
        Doctor::factory()
            ->count(4)
            ->create();
    }
}
