<?php

namespace Database\Factories;

use App\Models\Adopter;
use App\Models\Animal;
use App\Models\Coat;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class CoatFactory extends Factory
{
    protected $model = Coat::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
        ];
    }
}
