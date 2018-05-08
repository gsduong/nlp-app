<?php

use Illuminate\Database\Seeder;
use App\Intent;
use App\Document;

class AskMenuIntentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// ask_menu
		$ask_menu = Intent::where('name', 'ask_menu')->first();
		Document::custom_create('Cho tôi xem menu đồ ăn đồ uống (thực đơn)', $ask_menu->id);
		Document::custom_create('Cho xem thực đơn (menu) đồ ăn đồ uống', $ask_menu->id);
		Document::custom_create('Thực đơn (menu) đồ ăn đồ uống như nào ạ?', $ask_menu->id);
		Document::custom_create('Tôi cần thực đơn (menu) đồ ăn đồ uống để xem', $ask_menu->id);
		Document::custom_create('Danh sách (menu, thực đơn) đồ ăn đồ uống như nào?', $ask_menu->id);
		Document::custom_create('Thực đơn (menu) đồ uống đồ ăn có gì?', $ask_menu->id);
		Document::custom_create('Đồ ăn đồ uống (menu) trong thực đơn hay menu có những gì?', $ask_menu->id);
		Document::custom_create('Có đồ ăn đồ uống trong menu hay thực đơn của nhà hàng?', $ask_menu->id);
		Document::custom_create('đồ ăn đồ uống trong menu thực đơn như nào', $ask_menu->id);
		Document::custom_create('cho tôi xem đồ uống đồ ăn trong menu hay thực đơn', $ask_menu->id);
		Document::custom_create('đồ ăn đồ uống trong menu hoặc thực đơn của nhà hàng', $ask_menu->id);
		Document::custom_create('Trong menu hoặc là thực đơn thì Có đồ ăn đồ uống gì nhỉ?', $ask_menu->id);
		Document::custom_create('Tôi cần xem menu hoặc thực đơn để biết có đồ ăn đồ uống gì', $ask_menu->id);
		Document::custom_create('Có những món ăn món uống gì trong menu (thực đơn) nhà hàng?', $ask_menu->id);
		Document::custom_create('Có những đồ uống hay đồ ăn (menu hay thực đơn) gì?', $ask_menu->id);
		Document::custom_create('Có gì uống ăn được trong menu hay thực đơn?', $ask_menu->id);
		Document::custom_create('Đồ ăn đồ uống (trong menu, thực đơn) thế nào?', $ask_menu->id);
		Document::custom_create('Cho tôi xem danh sách các món ăn uống (menu, thực đơn)', $ask_menu->id);
		Document::custom_create('Nhà hàng có đồ ăn đồ uống gì trong menu (hoặc là thực đơn)?', $ask_menu->id);
		Document::custom_create('Nhà hàng có những đồ ăn đồ uống gì trong menu (thực đơn) ?', $ask_menu->id);
		Document::custom_create('Quán có món gì ngon trong menu hoặc là thực đơn (đồ ăn đồ uống)?', $ask_menu->id);
    }
}
