<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'email_verified_at' => now(),
        'remember_token' => Str::random(10),
        'name' => 'Weabers',
        'email' => 'admin@weabers.com',
        'gender' => 'other',
        'type' => 'admin',
        'address' => '2023 Abdus Sobhan Dhali Road',
        'city' => 'Dhaka',
        'zip' => '1229',
        'teacher_code' => 'STUPIDCODE',
        'country' => 'Bangladesh',
        'password' => Hash::make('pass@weabers')
    ];
});
