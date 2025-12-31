<?php

namespace Database\Factories;

use App\Models\Animal;
use App\Models\Coat;
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
            'coat_id' => Coat::inRandomOrder()->first()->id ?? $this->faker->word(),
            'description'=> $this->faker->text(),
        ];
    }
}
