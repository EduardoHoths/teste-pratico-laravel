<?php

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use function Pest\Laravel\post;

it('should update user profile', function () {
    $user = User::factory()->create([
        'password' => Hash::make('Password123')
    ]);



    post(route("login"), [
        'email' => $user->email,
        'password' => 'Password123',
        '_token' => csrf_token(),
    ]);

    Storage::fake('public');
    $avatar = UploadedFile::fake()->create(
        'avatar.jpg',
        500,
        'image/jpeg'
    );

    $response = post(route('dashboard.update'), [
        'name' => 'New Name',
        'email' => 'newemail@example.com',
        'password' => 'NewPassword123',
        'password_confirmation' => 'NewPassword123',
        'avatar' => $avatar,
    ]);

    $response->assertSessionHasNoErrors();
    $response->assertRedirect();

    $user->refresh();
    expect($user->name)->toBe('New Name');
    expect($user->email)->toBe('newemail@example.com');
    expect($user->avatar)->not->tobe('default.png');
});
