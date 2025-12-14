<?php


use App\Models\Adopter;
use App\Models\Animal;

beforeEach(function () {
    $user = \App\Models\User::factory()->create();

    \Pest\Laravel\actingAs($user);
});


it('There are species in the application', function () {

    //arrange
    \App\Models\Specie::factory()->count(3)->create();

    //act

    //assert
    expect(\App\Models\Specie::count())->toBe(3);
});



