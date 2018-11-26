<?php

use Faker\Generator as Faker;

$factory->define(App\Round::class, function (Faker $faker) {
    return [
        'type' => $faker->randomElement(['Knock out', 'Preliminary']),
        'round_number' => $faker->randomDigit
    ];
});
