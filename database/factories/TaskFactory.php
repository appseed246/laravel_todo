<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'content' => $faker->realText($maxNbChars = 20, $indexSize = 1),
        'limit' => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
    ];
});
