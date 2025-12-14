<?php

namespace Database\Factories;

use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class AnimalFactory extends Factory
{
    protected $model = Animal::class;

    public function definition(): array
    {
        return [
            'name'=> $this->faker->firstName(),
            'age'=> $this->faker->date(),
            'temper' => $this->faker->text(),
            'coat'=> $this->faker->word(),
            'description'=> $this->faker->text(),
        ];
    }
}
