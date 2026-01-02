<?php

namespace Database\Seeders;

use App\Models\Adopter;
use App\Models\Adoption;
use App\Models\Animal;
use App\Models\Breed;
use App\Models\Coat;
use App\Models\Specie;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecieSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $coats = Coat::factory(10)->create();

        // c'est ici qu'on seed les breeds
        Specie::factory(10)
            ->has(Breed::factory(2)
                ->has(Animal::factory(2)
                    ->has(Adoption::factory()
                        ->for(Adopter::factory()))
                )
            )
            ->create();
    }
}
