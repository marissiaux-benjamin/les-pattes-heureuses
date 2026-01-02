<?php


use App\Models\Adopter;
use App\Models\Animal;
use App\Models\contact;

beforeEach(function () {
    $user = \App\Models\User::factory()->create();

    \Pest\Laravel\actingAs($user);
});


it('There are contacts concerns in the application', function () {

    //arrange
    \App\Models\ContactConcern::factory()->count(3)->create(['contact_id' => 1]);

    //act

    //assert
    expect(\App\Models\ContactConcern::count())->toBe(3);
});



