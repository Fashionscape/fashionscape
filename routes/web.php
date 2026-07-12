<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::get('/auth/redirect', function () {
    return Socialite::driver('discord')->redirect();
});

Route::get('/auth/callback', function () {
    $discord_user = Socialite::driver('discord')->user();

    $user = User::updateOrCreate([
        'discord_snowflake' => $discord_user->getId(),
        'name' => $discord_user->getNickname(),
        'email' => $discord_user->getEmail(),
    ]);

    Auth::login($user);

    return redirect('/dashboard');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
