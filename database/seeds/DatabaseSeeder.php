<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('user_types')->insert([
            'name' => 'System Admin',
            'created_at' => Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => 'Norest Mukumba',
            'email' => 'norestmukumba@gmail.com',
            'phone' => '0773843783',
            'user_type_id' => 1,
            'created_at' => Carbon::now(),
            'password' => Hash::make('norest123'),
        ]);
    }
}
