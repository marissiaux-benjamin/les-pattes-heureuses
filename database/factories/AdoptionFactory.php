<?php

namespace Database\Factories;

use App\Models\Adoption;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class AdoptionFactory extends Factory
{
    protected $model = Adoption::class;

    public function definition(): array
    {
        return [
            'note' => $this->faker->text(),
            'requested_at' => $this->faker->dateTime(),
            'adopted_at' => $this->faker->dateTime(),
            'message_from_application' => $this->faker->text(),
        ];
    }
}
