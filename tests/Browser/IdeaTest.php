<?php

use App\Models\User;

it('Shows all ideas', function () {
    $this->actingAs($user = User::factory()->create());

    $user->ideas()->create([
//        'state' => 'pending',
        'description' => 'Description of my first idea',
    ]);

    visit('/ideas')
        ->assertSee('Description of my first idea');



});
it('Shows a single idea', function () {
    $this->actingAs($user = User::factory()->create());

    $idea = $user->ideas()->create([
        'state' => 'pending',
        'description' => 'Description of my first idea',
    ]);
    visit('/ideas')
        ->assertSee('Description of my first idea')
        ->press('@shows-single-idea')
        ->assertPathIs('/ideas/'.$idea->id)
        ->assertSee('Description of my first idea');


});

it('Shows edit form to update an idea', function () {
    $this->actingAs($user = User::factory()->create());

    $idea = $user->ideas()->create([
        'state' => 'pending',
        'description' => 'Description of my first idea',
    ]);
    visit('/ideas')
        ->assertSee('Description of my first idea')
        ->press('@shows-single-idea')
        ->assertPathIs('/ideas/'.$idea->id)
        ->assertSee('Description of my first idea')
        ->press('@edit-idea')->debug();
});
