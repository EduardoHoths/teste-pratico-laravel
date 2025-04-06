<?php


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use function Pest\Laravel\{post, get};

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

it('should login user', function () {
    $user = User::factory()->create([
        'password' => Hash::make('SenhaForte123!'),
    ]);

    post('/login', [
        'email' => $user->email,
        'password' => 'SenhaForte123!',
        
    ])
        ->assertStatus(302)
        ->assertRedirect('/dashboard');

    $this->assertAuthenticated();
});

it('should not login user with wrong credentials', function () {
    $user = User::factory()->create([
        'password' => Hash::make('SenhaForte123!'),
    ]);

    post('/login', [
        'email' => $user->email,
        'password' => 'wrongpassword',
        
    ])
        ->assertStatus(302)
        ->assertRedirect('/');

    $this->assertGuest();
});
