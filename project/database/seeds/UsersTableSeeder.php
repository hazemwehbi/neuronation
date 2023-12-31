<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	App\Models\User::truncate();

        App\Models\User::insert([
            'name' => 'Testcase User',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => 'CbsPewVio/rwm2Fb50herdw7L1c8Qwh8Ut4Pbd40s', // password
            'remember_token' => Str::random(10),
        ]);

        factory(\App\Models\User::class, 100)->create();
    }
}
