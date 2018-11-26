<?php

use Faker\Generator as Faker;

$factory->define(App\Table::class, function (Faker $faker) {
    return [
        'round_id' => factory(App\Round::class)->create()->id
    ];
});
