<?php


use App\Models\Adopter;
use App\Models\Animal;
use App\Models\contact;

beforeEach(function () {
    $user = \App\Models\User::factory()->create();

    \Pest\Laravel\actingAs($user);
});


it('There are contacts in the application', function () {

    //arrange
    Contact::factory()->count(3)->create();

    //act

    //assert
    expect(Contact::count())->toBe(3);
});



