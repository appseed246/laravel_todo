<?php

use Faker\Generator as Faker;

$factory->define(App\UserProfile::class, function (Faker $faker) {
    return [
        'fullname' => $faker->name,
        'birthday' => $faker->dateTimeBetween('-80 years', '-20years')->format('Y-m-d'),
        'postcode' => $faker->postcode,
        'prefecture' => $faker->prefecture,
        'city' => $faker->city,
        'street_address' => $faker->streetAddress
    ];
});
