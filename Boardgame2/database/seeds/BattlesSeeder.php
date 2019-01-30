<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BattlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,2) as $index) {
        \App\Battles::insert([
            'name' => 'Fittest on earth',
            'game_id' => 1,
            'games_id' => 1,
            'player1' => 2,
            'player2' => 3,
            'player3' => 4,
            'player4' => 5,
            'player5' => 1,
            'player6' => 6,
            'won_by' => 5,
            'img' => 'https://freepngimg.com/download/tv_shows/30801-2-game-of-thrones-transparent-background.png'
        ]);

        \App\Battles::insert([
            'name' => 'Become stronger and fight',
            'game_id' => 1,
            'games_id' => 1,
            'player1' => 1,
            'player2' => 2,
            'player3' => 3,
            'player4' => 4,
            'won_by' => 2,
            'img' => 'https://freepngimg.com/download/tv_shows/30801-2-game-of-thrones-transparent-background.png'
        ]);

        \App\Battles::insert([
            'name' => 'Terminators vs Orcs',
            'game_id' => 2,
            'games_id' => 2,
            'player1' => 2,
            'player2' => 3,
            'player3' => 1,
            'won_by' => 3,
            'img' => 'https://d1u5p3l4wpay3k.cloudfront.net/wowpedia/thumb/e/e6/WoW_icon.png/250px-WoW_icon.png?version=be2ed78b3c9b7594d78d9fe4eebb20e5'
        ]);

        \App\Battles::insert([
            'name' => 'Survival of the fittest',
            'game_id' => 2,
            'games_id' => 2,
            'player1' => 2,
            'player2' => 1,
            'player3' => 5,
            'player4' => 3,
            'player5' => 2,

            'won_by' => 2,
            'img' => 'https://d1u5p3l4wpay3k.cloudfront.net/wowpedia/thumb/e/e6/WoW_icon.png/250px-WoW_icon.png?version=be2ed78b3c9b7594d78d9fe4eebb20e5'
        ]);

        \App\Battles::insert([
            'name' => 'You have to be fit to survive',
            'game_id' => 3,
            'games_id' => 3,
            'player1' => 3,
            'player2' => 2,
            'player3' => 1,
            'player4' => 4,
            'won_by' => 1,
            'img' => 'https://img00.deviantart.net/0156/i/2013/095/e/9/lord_of_the_rings_icon_by_slamiticon-d60ici4.png'
        ]);
        }


    }
}
