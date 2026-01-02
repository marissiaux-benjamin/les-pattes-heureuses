<?php


use App\Models\Adopter;
use App\Models\Animal;

beforeEach(function () {
    $user = \App\Models\User::factory()->create();

    \Pest\Laravel\actingAs($user);
});


it('There are adopters in the application', function () {

    //arrange
    \App\Models\Adopter::factory()->count(3)->create();

    //act

    //assert
    expect(Adopter::count())->toBe(3);
});



