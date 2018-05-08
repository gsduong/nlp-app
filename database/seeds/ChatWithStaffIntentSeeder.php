<?php

use Illuminate\Database\Seeder;
use App\Intent;
use App\Document;

class ChatWithStaffIntentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// chat_with_staff
		$chat_with_staff = Intent::where('name', 'chat_with_staff')->first();
		Document::custom_create('tôi muốn chat (nói chuyện) với nhân viên ', $chat_with_staff->id);
		Document::custom_create('cho tôi (chat, nói chuyện) với admin (nhân viên)', $chat_with_staff->id);
		Document::custom_create('cho tôi (chat, nói chuyện) với admin (nhân viên)', $chat_with_staff->id);
		Document::custom_create('cho tôi nói chuyện (chat,) với nhân viên (admin)', $chat_with_staff->id);
		Document::custom_create('cho tôi chat (nói, nói chuyện) với người thật (admin, nhân viên)', $chat_with_staff->id);
		Document::custom_create('nói chuyện (chat,) với admin (nhân viên)', $chat_with_staff->id);
		Document::custom_create('chat (nói chuyện) với admin hoặc nhân viên', $chat_with_staff->id);
		Document::custom_create('chat (nói chuyện,) với nhân viên hoặc admin', $chat_with_staff->id);
		Document::custom_create('cần nhân viên giúp đỡ (chat, nói chuyện với nhân viên hoặc admin)', $chat_with_staff->id);
		Document::custom_create('help (nói chuyện với nhân viên)', $chat_with_staff->id);
		Document::custom_create('tôi cần nói chuyện (chat) với nhân viên (admin)', $chat_with_staff->id);
		Document::custom_create('cần sự giúp đỡ của nhân viên (cần nói chuyện, chat)', $chat_with_staff->id);
		Document::custom_create('cần nói chuyện (chat,) với admin hoặc nhân viên', $chat_with_staff->id);
		Document::custom_create('cần chat với người nhân viên (hoặc admin) nào đó (nói chuyện,)', $chat_with_staff->id);
		Document::custom_create('cần chat với người admin (hoặc nhân viên) nào đó(nói chuyện)', $chat_with_staff->id);
		Document::custom_create('cần chat với người (nhân viên hoặc admin) (nói chuyện,)', $chat_with_staff->id);
		Document::custom_create('cần chat với người (nhân viên hoặc admin hoặc ai đó) (nói chuyện,)', $chat_with_staff->id);
		Document::custom_create('Cần nói chuyện hoặc là chat với nhân viên nhà hàng', $chat_with_staff->id);
		Document::custom_create('cho tớ gặp trực tiếp nhân viên để nói chuyện (hoặc admin, để chat)', $chat_with_staff->id);
    }
}
