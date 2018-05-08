<?php

use Illuminate\Database\Seeder;
use App\Intent;
use App\Document;
class GreetingIntentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// greeting
		$greeting = Intent::where('name', 'greeting')->first();
		Document::custom_create('Xin chào (hello)', $greeting->id);
		Document::custom_create('Chào (hello) ad', $greeting->id);
		Document::custom_create('Chào (hello) admin', $greeting->id);
		Document::custom_create('Hello (chào)', $greeting->id);
		Document::custom_create('Hello nhà hàng nhé. Chào ad. Chào bot', $greeting->id);
		Document::custom_create('Helo (chào nhé)', $greeting->id);
		Document::custom_create('Xin chào (hello bạn) bạn', $greeting->id);
		Document::custom_create('Chào (hello) bạn nhé', $greeting->id);
		Document::custom_create('Xin chào (hello) ạ', $greeting->id);
		Document::custom_create('Hello (chào) bot nhé', $greeting->id);
		Document::custom_create('Hello. Chào bot', $greeting->id);
		Document::custom_create('Hello (chào) nhà hàng ạ', $greeting->id);
		Document::custom_create('Xin chào (hello) nhà hàng ạ', $greeting->id);
		Document::custom_create('Xin chào bạn (hello bạn)', $greeting->id);
		Document::custom_create('Mình chào bạn (hello) nhé', $greeting->id);
		Document::custom_create('Tớ xin chào (hello)', $greeting->id);
		Document::custom_create('Hello, chào nhà hàng nhé', $greeting->id);
		Document::custom_create('Mình xin chào (hello) quán nhé', $greeting->id);
		Document::custom_create('Hello (xin chào) nhà hàng ạ', $greeting->id);
    }
}
