<?php

use Illuminate\Database\Seeder;
use App\Intent;
use App\Document;
class GoodbyeIntentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// goodbye
		$goodbye = Intent::where('name', 'goodbye')->first();
		Document::custom_create('tạm biệt. (bye, see later)', $goodbye->id);
		Document::custom_create('Bye (tạm biệt, bye, see later)', $goodbye->id);
		Document::custom_create('chào tạm biệt nhé', $goodbye->id);
		Document::custom_create('bye (tạm biệt nhé)', $goodbye->id);
		Document::custom_create('bye bye (tạm biệt gặp lại sau)', $goodbye->id);
		Document::custom_create('bye (tạm biệt ạ)', $goodbye->id);
		Document::custom_create('bye (tạm biệt bạn nhé)', $goodbye->id);
		Document::custom_create('Bye nhé bạn (tạm biệt)', $goodbye->id);
		Document::custom_create('tạm biệt (bye bye) nhé', $goodbye->id);
		Document::custom_create('hẹn gặp lại (tạm biệt, bye bye)', $goodbye->id);
		Document::custom_create('tạm biệt (bye) và hẹn gặp lại', $goodbye->id);
		Document::custom_create('see ya (tạm biệt, bye)', $goodbye->id);
		Document::custom_create('see you again (tạm biệt, bye)', $goodbye->id);
		Document::custom_create('tạm biệt (bye nhé) nhé', $goodbye->id);
		Document::custom_create('tạm biệt (bye) quán mình sẽ quay lại sau nhé', $goodbye->id);
		Document::custom_create('tạm biệt (bye) và hẹn gặp lại quán trong 1 ngày nào đó', $goodbye->id);
		Document::custom_create('xin tạm biệt (bye. see ya!', $goodbye->id);
    }
}
