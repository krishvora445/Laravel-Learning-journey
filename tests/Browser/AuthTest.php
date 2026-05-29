<?php

use App\Models\User;

it('register a user', function () {
        $page = visit('/register')
        ->fill('name', 'KrishVora')
        ->fill('email', 'KrishVora784@gmail.com')
        ->fill('password', 'KrishVora@784')

        ->press('@register-button')
        ->assertPathIs('/ideas');

//        expect(User::count())->toBe(1);
        expect(User::where('email','KrishVora784@gmail.com')->exists())->toBe(true);

        $this->assertAuthenticated();


    });

