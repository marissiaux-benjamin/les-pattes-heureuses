<?php


use App\Models\Animal;

beforeEach(function () {
    $user = \App\Models\User::factory()->create();

    \Pest\Laravel\actingAs($user);
});


it('There are animals in the application', function () {

    //arrange
    \App\Models\Animal::factory()->count(3)->create(['breed_id' => random_int(0, 5), 'species_id' => random_int(0, 5)]);

    //act
    $animals = Animal::get()->all();

    //assert
    expect(Animal::count())->toBe(3);
});



