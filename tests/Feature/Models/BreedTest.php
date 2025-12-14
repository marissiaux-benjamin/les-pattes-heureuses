<?php


use App\Models\Adopter;
use App\Models\Animal;

beforeEach(function () {
    $user = \App\Models\User::factory()->create();

    \Pest\Laravel\actingAs($user);
});


it('There are breeds in the application', function () {

    //arrange
    \App\Models\Breed::factory()->count(3)->create(['specie_id' => 1]);

    //act

    //assert
    expect(\App\Models\Breed::count())->toBe(3);
});



