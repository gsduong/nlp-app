<?php

use Illuminate\Database\Seeder;
use App\Intent;
use App\Document;
class AskAddressIntentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// ask_address
		$ask_address = Intent::where('name', 'ask_address')->first();
		Document::custom_create('địa chỉ (address, địa điểm, location, vị trí) như nào nhỉ', $ask_address->id);
		Document::custom_create('cho xin địa điểm (location, vị trí, địa chỉ, address) của quán', $ask_address->id);
		Document::custom_create('cho tôi address (địa chỉ, địa điểm, vị trí, location)', $ask_address->id);
		Document::custom_create('nhà hàng ở đâu (địa điểm, địa chỉ, vị trí, location) nhỉ?', $ask_address->id);
		Document::custom_create('địa chỉ (địa điểm, location, address, vị trí) của nhà hàng?', $ask_address->id);
		Document::custom_create('địa điểm (vị trí, location, address, địa chỉ) của nhà hàng là ở đâu?', $ask_address->id);
		Document::custom_create('tôi cần biết vị trí (địa điểm, location, địa chỉ, address) của nhà hàng', $ask_address->id);
		Document::custom_create('tôi cần biết đường (địa chỉ, vị trí, address, location) đến nhà hàng', $ask_address->id);
		Document::custom_create('Nhà hàng ở đâu (đường, địa chỉ, vị trí, location) vậy?', $ask_address->id);
		Document::custom_create('Nhà hàng ở chỗ nào (đường, vị trí, địa điểm, location)?', $ask_address->id);
		Document::custom_create('Cho xin địa chỉ (đường, vị trí, địa điểm) của quán với', $ask_address->id);
		Document::custom_create('Địa chỉ (đường, địa điểm, vị trí, location, address)?', $ask_address->id);
		Document::custom_create('Địa chỉ (location, address, địa điểm, đường) như nào', $ask_address->id);
		Document::custom_create('Vị trí (đường, địa điểm, location) quán?', $ask_address->id);
		Document::custom_create('Cho xin thông tin địa điểm (vị trí, đường, location, address) của quán', $ask_address->id);
		Document::custom_create('Cho xin địa chỉ (địa điểm, vị trí, location, address) quán', $ask_address->id);
    }
}
