<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'team11',
            'lastName' => 'cd',
            'verified' => 1,
            'email_verified_at' => Carbon::now()->toDateTimeString(),
            'email' => '999games@gmail.com',
            'password' => bcrypt('Admin123!'),
            'role_id' => 1,
        ]);
    }
}
