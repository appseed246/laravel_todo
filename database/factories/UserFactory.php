<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'login_id' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'status' => 1,
        'password' => bcrypt('test'),
        'remember_token' => str_random(10),
    ];
});
