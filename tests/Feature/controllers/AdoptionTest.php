<?php


use App\Models\Adopter;
use App\Models\Animal;

beforeEach(function () {
    $this->user = \App\Models\User::factory()->create();

    \Pest\Laravel\actingAs($this->user);
});


it('Displays a detailed adoption application in the "show" view.', function () {

    //arrange
    $adoption_application = \App\Models\Adoption::factory()->create(['animal_id' => random_int(0,5),'adopter_id' => random_int(0,5)]);

    //act
    $response = $this->get('/adoption/' . $adoption_application->id);

    //assert
    $response->assertSee($adoption_application->name);
});



