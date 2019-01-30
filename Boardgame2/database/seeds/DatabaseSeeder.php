<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BattlesSeeder::class);
        $this->call(GamesSeeder::class);

        \App\User::insert([
            'name' => 'Akash Soedamah',
            'email' => 'Akash.soedamah@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$SDY37vq4iJeRYTonYWzaqO0q9yvHFZYKOdVKN2KCDNByxxNb2sjIK', // secret
            'remember_token' => str_random(10),
        ]);

        factory(App\User::class, 3)->create();
    }
}
