<?php

use App\Models\User;
use function Pest\Laravel\post;

it('should create a new user', function () {
    $userData = [
        'name' => 'João Silva',
        'email' => 'joao@example.com',
        'password' => 'SenhaForte123!',
        'password_confirmation' => 'SenhaForte123!',
    ];

    post(route("register.create"), $userData)
        ->assertStatus(302)
        ->assertRedirect('/dashboard');

    expect(User::where('email', $userData['email'])->exists())->toBeTrue();
});

it('should not create a new user with existing email', function () {
    $userData = [
        'name' => 'Andre Silva',
        'email' => 'andre@example.com',
        'password' => 'SenhaForte123!',
        'password_confirmation' => 'SenhaForte123!'
    ];

    $response = post(route("register.create"), $userData);

    $response->assertStatus(302)
        ->assertRedirect('/dashboard');

    post(route("logout"));

    $duplicateUserData = $userData;
    $duplicateUserData['name'] = 'Maria Oliveira';

    $response = post(route("register.create"), $duplicateUserData);

    $response->assertSessionHasErrors('email');

    expect(User::where('email', $userData['email'])->count())->toBe(1);
});

it('should not create a new user with week password', function () {
    $userData = [
        'name' => 'Jose Silva',
        'email' => 'jose@examplee.com',
        'password' => 'senhafraca',
        'password_confirmation' => 'senhafraca',
    ];

    $initialUserCount = User::count();

    $response = post(route("register.create"), $userData);

    $response->assertSessionHasErrors();

    expect(User::count())->toBe($initialUserCount);
});

