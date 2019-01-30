<?php

use Illuminate\Database\Seeder;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Games::insert([
            'name' => 'Game of Thrones',
            'release_date' => '2003',
            'description' =>
                'A Game of Thrones is an epic board game in which it will take more than military might to win.',
            'winner' => 'Pieter Jansma',
            'min_players' => 3,
            'max_players' => 6,
            'image' => 'https://www.lautapelit.fi/images/tuotekuvat/kuva400/lautapelit/game-of-thrones-2nd-edition.jpg',
            'battle_img' => 'http://abovethelaw.com/wp-content/uploads/2015/04/game-of-thrones.jpg',
            'img' => 'https://freepngimg.com/download/tv_shows/30801-2-game-of-thrones-transparent-background.png'
        ]);

        \App\Games::insert([
            'name' => 'World of Warcraft',
            'release_date' => '2005',
            'description' => 'World of Warcraft: The Board Game is an adventure board game based on the popular World of Warcraft MMORPG.',
            'winner' => 'Jantje Smits',
            'min_players' => 2,
            'max_players' => 6,
            'image' => 'http://i.ebayimg.com/00/s/NTAwWDUwMA==/z/DhwAAOxyOMdS-tAQ/$_3.JPG?set_id=2',
            'battle_img' => 'https://blznav.akamaized.net/img/games/cards/card-world-of-warcraft-54576e6364584e35.jpg',
            'img' => 'https://d1u5p3l4wpay3k.cloudfront.net/wowpedia/thumb/e/e6/WoW_icon.png/250px-WoW_icon.png?version=be2ed78b3c9b7594d78d9fe4eebb20e5'
        ]);

        \App\Games::insert([
            'name' => 'Lord of the Rings',
            'release_date' => '2000',
            'description' => 'Lord of the Rings is a board game based on the high fantasy novel The Lord of the Rings by J. R. R. Tolkien.',
            'winner' => 'Leon Hendricks',
            'min_players' => 2,
            'max_players' => 5,
            'image' => 'https://images-na.ssl-images-amazon.com/images/I/914GYKLDR-L._SX466_.jpg',
            'battle_img' => 'https://cdn.vox-cdn.com/thumbor/nRu2ccLSeYke8-EGrIi1ohMDLdI=/0x0:825x464/1200x800/filters:focal(347x166:479x298)/cdn.vox-cdn.com/uploads/chorus_image/image/57584235/DOiAi2WUEAE3A1Y.0.jpg',
            'img' => 'https://img00.deviantart.net/0156/i/2013/095/e/9/lord_of_the_rings_icon_by_slamiticon-d60ici4.png'
        ]);





    }
}
