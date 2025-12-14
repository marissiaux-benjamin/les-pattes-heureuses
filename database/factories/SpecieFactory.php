<?php

namespace Database\Factories;

use App\Models\Adopter;
use App\Models\Animal;
use App\Models\Specie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class SpecieFactory extends Factory
{
    protected $model = Specie::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
        ];
    }
}
