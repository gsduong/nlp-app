<?php

use Illuminate\Database\Seeder;
use App\Intent;
use App\Document;
class AskOpeningHourIntentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	// ask_opening_hour
		$ask_opening_hour = Intent::where('name', 'ask_opening_hour')->first();
		Document::custom_create('Mấy giờ mở cửa (time open) và mấy giờ đóng cửa (time close)', $ask_opening_hour->id);
		Document::custom_create('Khi nào đóng cửa và khi nào thì mở cửa', $ask_opening_hour->id);
		Document::custom_create('Nhà hàng mở cửa hoạt động từ lúc nào và đóng cửa lúc nào ạ?', $ask_opening_hour->id);
		Document::custom_create('Quán mở cửa từ mấy giờ và đóng cửa lúc mấy giờ?', $ask_opening_hour->id);
		Document::custom_create('9h00 đã mở cửa (opening time) chưa và 10h00 đã đóng cửa (closing time) chưa', $ask_opening_hour->id);
		Document::custom_create('Mở cửa lúc nào (Time open)?', $ask_opening_hour->id);
		Document::custom_create('Đóng cửa lúc nào (Time close)?', $ask_opening_hour->id);
		Document::custom_create('Nhà hàng mở cửa bán từ mấy giờ và mấy giờ đóng cửa', $ask_opening_hour->id);
		Document::custom_create('Khi nào nhà hàng mới mở cửa và khi nào thì sẽ đóng cửa?', $ask_opening_hour->id);
		Document::custom_create('1 giờ đêm còn mở cửa không hay là đóng cửa rồi?', $ask_opening_hour->id);
		Document::custom_create('Giờ mở cửa và đóng cửa - giờ hoạt động như nào?', $ask_opening_hour->id);
		Document::custom_create('Tôi cần biết lúc nào thì nhà hàng mở cửa và lúc nào thì nhà hàng đóng cửa?', $ask_opening_hour->id);
		Document::custom_create('Tôi cần biết lúc nào thì nhà hàng đóng cửa và lúc nào thì mở cửa?', $ask_opening_hour->id);
		Document::custom_create('Nhà hàng mở lúc nào và đóng lúc nào?', $ask_opening_hour->id);
		Document::custom_create('Muộn thế này còn mở cửa không. 15p nữa t đến thì đóng cửa chưa?', $ask_opening_hour->id);
		Document::custom_create('Sớm thế này đã mở cửa chưa? 1p nữa t đến thì vẫn còn đóng cửa?', $ask_opening_hour->id);
		Document::custom_create('Tôi cần biết khi nào mở cửa và khi nào đóng cửa', $ask_opening_hour->id);
		Document::custom_create('Quán đã đóng cửa (mở cửa) chưa', $ask_opening_hour->id);
		Document::custom_create('Quán đã mở cửa (đóng cửa) chưa', $ask_opening_hour->id);
    }
}
