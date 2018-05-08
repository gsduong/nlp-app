<?php

use Illuminate\Database\Seeder;
use App\Intent;
use App\Document;
class ThankYouIntentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// thank_you
		$thank_you = Intent::where('name', 'thank_you')->first();
		Document::custom_create('cảm ơn nhé (thanks, tks, cám ơn)', $thank_you->id);
		Document::custom_create('thanks (cám ơn, cảm ơn, thank, tks, )', $thank_you->id);
		Document::custom_create('thank you (cảm ơn)', $thank_you->id);
		Document::custom_create('cám ơn (cảm ơn, thank, thanks)', $thank_you->id);
		Document::custom_create('tks (cảm ơn, cám ơn)', $thank_you->id);
		Document::custom_create('(cám ơn, cảm ơn) nhiều nhé', $thank_you->id);
		Document::custom_create('cảm ơn (cám ơn, thanks, thank, tks, )', $thank_you->id);
		Document::custom_create('cảm ơn bạn nhé (cám ơn, thanks, thank)', $thank_you->id);
		Document::custom_create('thanks bạn (cám ơn, cảm ơn, thank, tks, )', $thank_you->id);
		Document::custom_create('xin cảm ơn nhà hàng (cám ơn, thanks, thank, tks)', $thank_you->id);
		Document::custom_create('thanks so much (cảm ơn, cám ơn)', $thank_you->id);
		Document::custom_create('cảm ơn nhiều nhé (cám ơn, thanks, thank)', $thank_you->id);
		Document::custom_create('Xin cảm ơn (cám ơn, thanks, thank, tks, )', $thank_you->id);
		Document::custom_create('Cảm ơn đã trả lời tin nhắn (cám ơn, thanks, thank, tks, )', $thank_you->id);
		Document::custom_create('Cảm ơn (cám ơn, thanks, thank, tks) đã giúp', $thank_you->id);
		Document::custom_create('Thank (thanks, cám ơn, cảm ơn, tks, ) nhiều nhé', $thank_you->id);
		Document::custom_create('Thật sự cảm ơn (cám ơn, thanks, thank, tks)', $thank_you->id);
    }
}
