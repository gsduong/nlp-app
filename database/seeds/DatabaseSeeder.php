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
        $this->call(UsersTableSeeder::class);
        $this->call(IntentsTableSeeder::class);
        $this->call(AskAddressIntentSeeder::class);
        $this->call(AskMenuIntentSeeder::class);
        $this->call(AskOpeningHourIntentSeeder::class);
        $this->call(AskPhoneNumberIntentSeeder::class);
        $this->call(BookingIntentSeeder::class);
        $this->call(ChatWithStaffIntentSeeder::class);
        $this->call(GoodbyeIntentSeeder::class);
        $this->call(GreetingIntentSeeder::class);
        $this->call(ThankYouIntentSeeder::class);
    }
}
