<?php


use App\Models\Adopter;
use App\Models\Animal;

beforeEach(function () {
    $user = \App\Models\User::factory()->create();

    \Pest\Laravel\actingAs($user);
});


it('There are adopters in the application', function () {

    //arrange
    \App\Models\Adoption::factory()->count(3)->create(['animal_id' => 1,'adopter_id' => 1]);

    //act

    //assert
    expect(\App\Models\Adoption::count())->toBe(3);
});



