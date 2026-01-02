<?php

namespace Database\Factories;

use App\Models\Adopter;
use App\Models\Animal;
use App\Models\Specie;
use App\Models\Vaccin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class VaccinFactory extends Factory
{

    protected $model = Vaccin::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
