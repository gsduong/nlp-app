<?php

use Illuminate\Database\Seeder;

class IntentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('intents')->insert([
            'name' => "ask_menu"
        ]);
        DB::table('intents')->insert([
            'name' => "ask_opening_hour"
        ]);
        DB::table('intents')->insert([
            'name' => "booking"
        ]);
        DB::table('intents')->insert([
            'name' => "online_order"
        ]);
    }
}
