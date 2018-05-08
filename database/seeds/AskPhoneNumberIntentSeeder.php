<?php

use Illuminate\Database\Seeder;
use App\Intent;
use App\Document;
class AskPhoneNumberIntentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// ask_phone_number
		$ask_phone_number = Intent::where('name', 'ask_phone_number')->first();
		Document::custom_create('số điện thoại (sđt, sdt) của quán là gì?', $ask_phone_number->id);
		Document::custom_create('cho hỏi sđt (số điện thoại, sđt)', $ask_phone_number->id);
		Document::custom_create('cho hỏi số phone (sdt, sđt, số điện thoại)', $ask_phone_number->id);
		Document::custom_create('phone number (số điện thoại, sđt, sdt)?', $ask_phone_number->id);
		Document::custom_create('cho hỏi sdt (sdt, sđt, phone, số điện thoại) của quán', $ask_phone_number->id);
		Document::custom_create('Quán có mấy số điện thoại (sđt, sdt, phone number)', $ask_phone_number->id);
		Document::custom_create('Cho tôi hỏi số điện thoại (sđt, sdt, phone number)', $ask_phone_number->id);
		Document::custom_create('Cho tôi hỏi số phone? (số điện thoại, sđt, sdt)', $ask_phone_number->id);
		Document::custom_create('Phone number (sđt, sdt, số điện thoại) là gì?', $ask_phone_number->id);
		Document::custom_create('Tôi không call được số (sđt, sdt, phone number) của quán?', $ask_phone_number->id);
		Document::custom_create('SĐT (sdt, số điện thoại, phone number) là gì?', $ask_phone_number->id);
		Document::custom_create('Xin số điện thoại (sđt, sdt, phone number)', $ask_phone_number->id);
		Document::custom_create('Xin số đt (sđt, sdt, phone number)', $ask_phone_number->id);
		Document::custom_create('Tôi không thể liên lạc (gọi điện thoại, contact) được với nhà hàng', $ask_phone_number->id);
		Document::custom_create('Tôi liên lạc (contact, gọi) bằng số nào được?', $ask_phone_number->id);
		Document::custom_create('Tôi nên gọi (liên lạc, contact) vào số nào?', $ask_phone_number->id);
		Document::custom_create('Tôi cần biết số điện thoại (sđt, sdt, phone number)', $ask_phone_number->id);
		Document::custom_create('Tôi nên gọi vào số nào để liên lạc (contact) với nhà hàng?', $ask_phone_number->id);
		Document::custom_create('Cho mình xin sđt (số điện thoại, sdt, phone number)', $ask_phone_number->id);
    }
}
