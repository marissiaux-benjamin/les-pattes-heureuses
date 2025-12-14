<?php

namespace Database\Seeders;

use App\Models\Vaccin;
use Illuminate\Database\Seeder;

class VaccinSeeder extends Seeder
{
    public function run(): void
    {
        Vaccin::factory(10)->create();
    }
}
