<?php

namespace Database\Seeders;

use App\Models\Adopter;
use App\Models\Adoption;
use App\Models\Animal;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdoptionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $animals = Animal::all()->count();
        $adopters = Adopter::all()->count();
        Adoption::factory(10)->create(
            [
                'animal_id' => random_int(0, $animals),
                'adopter_id' => random_int(0, $adopters),
            ]);
    }
}
