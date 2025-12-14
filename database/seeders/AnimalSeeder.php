<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Breed;
use App\Models\Specie;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Animal::factory(20)
            ->has(Specie::factory()->count(1))
            ->has(Breed::factory()->count(1))
            ->create();
    }
}
