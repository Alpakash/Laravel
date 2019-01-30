<?php

use Faker\Generator as Faker;

// Creating a factory for BattlesSeeder
$factory->define(App\Battles::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'games_id' => rand(1, 3),
        'game_id' => rand(1, 3),
        'player1' => $faker->name,
        'player2' => $faker->name,
        'player3' => $faker->name,
        'player4' => $faker->name,
        'player5' => $faker->name,
        'player6' => $faker->name,
        'won_by' =>  $faker->name,
        'img' =>  'https://d1u5p3l4wpay3k.cloudfront.net/wowpedia/thumb/e/e6/WoW_icon.png/250px-WoW_icon.png?version=be2ed78b3c9b7594d78d9fe4eebb20e5',
        'played_date' => now(),
    ];
});
