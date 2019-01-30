<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $this->call(RolesTableSeeder::class);

        \App\User::insert([
            'name' => $faker->firstName,
            'lastName' => $faker->lastName,
            'email' => "admin@admin.nl",
            'email_verified_at' => now(),
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'role_id' => 1
        ]);

        \App\User::insert([
            'name' => $faker->firstName,
            'lastName' => $faker->lastName,
            'email' => "judge@judge.nl",
            'email_verified_at' => now(),
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'role_id' => 2
        ]);

        \App\User::insert([
            'name' => $faker->firstName,
            'lastName' => $faker->lastName,
            'email' => "user@user.nl",
            'email_verified_at' => now(),
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
            'role_id' => 3
        ]);

        factory(App\User::class, 127)->create();

    }
}
