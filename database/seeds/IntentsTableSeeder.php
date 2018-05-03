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
        DB::table('intents')->insert([
            'name' => "greeting"
        ]);
        DB::table('intents')->insert([
            'name' => "ask_phone_number"
        ]);
        DB::table('intents')->insert([
            'name' => "goodbye"
        ]);
        DB::table('intents')->insert([
            'name' => "thank_you"
        ]);
        DB::table('intents')->insert([
            'name' => "feedback"
        ]);
        DB::table('intents')->insert([
            'name' => "ask_address"
        ]);
    }
}
