<?php

namespace Database\Seeders;

use App\Models\Breed;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Vaccin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Ben',
            'email' => 'b@gmail.com',
            'password' => '12345678'
        ]);

        // on fait le seeder de tout en fait ici donc pas besoin de diviser en plein de seeder differents.

        $this->call([
            //AnimalSeeder::class,
            //AdoptionSeeder::class,
            SpecieSeeder::class,
//            BreedSeeder::class,
//            AdopterSeeder::class,
//            VaccinSeeder::class,
//            ContactSeeder::class,
//            ContactConcernSeeder::class,
        ]);

    }
}
