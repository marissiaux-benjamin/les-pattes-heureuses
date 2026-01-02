<?php

namespace Database\Factories;


use App\Models\Breed;
use App\Models\Contact;
use App\Models\ContactConcern;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ContactConcernFactory extends Factory
{
    protected $model = ContactConcern::class;

    public function definition(): array
    {
        return [
            'message' => $this->faker->text(),
        ];
    }
}
