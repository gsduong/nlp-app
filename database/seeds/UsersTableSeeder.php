<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'gsduong',
            'email' => 'gsduong'.'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
