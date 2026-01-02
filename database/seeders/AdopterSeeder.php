<?php

namespace Database\Seeders;

use App\Models\Adopter;
use App\Models\Animal;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdopterSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Adopter::factory(10)->create();
    }
}
