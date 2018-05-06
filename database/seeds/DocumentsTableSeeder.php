<?php

use Illuminate\Database\Seeder;
use App\Intent;
use App\Document;
class DocumentsTableSeeder extends Seeder
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
		Document::custom_create('Cho tôi xem menu', $ask_menu->id);
		Document::custom_create('Cho xem thực đơn', $ask_menu->id);
		Document::custom_create('Thực đơn như nào ạ?', $ask_menu->id);
		Document::custom_create('Tôi cần thực đơn', $ask_menu->id);
		Document::custom_create('Danh sách đồ ăn đồ uống như nào?', $ask_menu->id);
		Document::custom_create('Thực đơn có gì?', $ask_menu->id);
		Document::custom_create('Đồ ăn có những gì?', $ask_menu->id);
		Document::custom_create('Có đồ uống gì không?', $ask_menu->id);
		Document::custom_create('List đồ ăn như nào', $ask_menu->id);
		Document::custom_create('show list đồ uống', $ask_menu->id);
		Document::custom_create('show list đồ ăn', $ask_menu->id);
		Document::custom_create('Có đồ ăn đồ uống gì nhỉ?', $ask_menu->id);
		Document::custom_create('Tôi cần menu', $ask_menu->id);
		Document::custom_create('Có những món ăn gì?', $ask_menu->id);
		Document::custom_create('Có những đồ uống gì?', $ask_menu->id);
		Document::custom_create('Có gì uống được?', $ask_menu->id);
		Document::custom_create('Đồ ăn đồ uống thế nào?', $ask_menu->id);
		Document::custom_create('Cho tôi xem danh sách các món ăn uống', $ask_menu->id);
		Document::custom_create('Nhà hàng có món gì?', $ask_menu->id);
		Document::custom_create('Nhà hàng có đồ ăn đồ uống gì?', $ask_menu->id);
		Document::custom_create('Quán có món gì ngon?', $ask_menu->id);
		Document::custom_create('Quán có món gì để ăn', $ask_menu->id);
		Document::custom_create('Cho tôi xem menu', $ask_menu->id);


	// ask_opening_hour
		$ask_opening_hour = Intent::where('name', 'ask_opening_hour')->first();
		Document::custom_create('Mấy giờ mở cửa', $ask_opening_hour->id);
		Document::custom_create('Khi nào đóng cửa', $ask_opening_hour->id);
		Document::custom_create('Nhà hàng hoạt động từ lúc nào đến lúc nào ạ?', $ask_opening_hour->id);
		Document::custom_create('Quán mở cửa từ mấy giờ đến mấy giờ?', $ask_opening_hour->id);
		Document::custom_create('9h00 đã mở cửa chưa', $ask_opening_hour->id);
		Document::custom_create('Time open?', $ask_opening_hour->id);
		Document::custom_create('Time close?', $ask_opening_hour->id);
		Document::custom_create('Nhà hàng mở bán từ mấy giờ đến mấy giờ', $ask_opening_hour->id);
		Document::custom_create('Khi nào nhà hàng mới mở cửa?', $ask_opening_hour->id);
		Document::custom_create('1 giờ đêm còn mở cửa không?', $ask_opening_hour->id);
		Document::custom_create('Giờ hoạt động như nào?', $ask_opening_hour->id);
		Document::custom_create('Tôi cần biết lúc nào thì nhà hàng mở cửa?', $ask_opening_hour->id);
		Document::custom_create('Tôi cần biết lúc nào thì nhà hàng đóng cửa?', $ask_opening_hour->id);
		Document::custom_create('Từ lúc mở cửa đến lúc đóng cửa cách nhau mấy tiếng?', $ask_opening_hour->id);
		Document::custom_create('Muộn thế này còn mở cửa không?', $ask_opening_hour->id);
		Document::custom_create('Sớm thế này đã mở cửa chưa?', $ask_opening_hour->id);
		Document::custom_create('Muộn rồi còn mở cửa không?', $ask_opening_hour->id);
		Document::custom_create('Muộn rồi đã đóng cửa chưa?', $ask_opening_hour->id);
		Document::custom_create('Khi nào thì mở cửa?', $ask_opening_hour->id);

    	// booking
		$booking = Intent::where('name', 'booking')->first();
		Document::custom_create('Cho tôi đặt bàn', $booking->id);
		Document::custom_create('Cho đặt chỗ', $booking->id);
		Document::custom_create('Nhà hàng có nhận đặt bàn trước không?', $booking->id);
		Document::custom_create('Quán có nhận đặt bàn trước không?', $booking->id);
		Document::custom_create('Tôi muốn book 2 bàn cho 8 người ăn', $booking->id);
		Document::custom_create('Tôi muốn đặt bàn', $booking->id);
		Document::custom_create('Tôi muốn đặt chỗ', $booking->id);
		Document::custom_create('Tớ muốn đặt cho 10 người ăn', $booking->id);
		Document::custom_create('Nhà hàng có chỗ cho 20 người không?', $booking->id);
		Document::custom_create('Quán có chỗ cho 40 người và 5 trẻ nhỏ không?', $booking->id);
		Document::custom_create('Tôi muốn book 10 bàn', $booking->id);
		Document::custom_create('Tôi muốn đặt chỗ cho 20 người', $booking->id);
		Document::custom_create('Tôi cần bàn cho 30 người', $booking->id);
		Document::custom_create('Tôi cần 2 bàn ăn sinh nhật', $booking->id);
		Document::custom_create('Giờ này còn nhận đặt bàn không?', $booking->id);
		Document::custom_create('Tôi muốn đặt bàn ngay bây giờ', $booking->id);
		Document::custom_create('Tôi muốn book chỗ ngày mai', $booking->id);
		Document::custom_create('Tôi muốn đặt bàn vào tối nay', $booking->id);
		Document::custom_create('Tôi cần chỗ để ăn uống', $booking->id);
		Document::custom_create('Tôi cần bàn để ăn uống', $booking->id);
		Document::custom_create('Cho tớ đặt bàn với', $booking->id);
		Document::custom_create('Đặt chỗ được không vậy?', $booking->id);
		Document::custom_create('Tôi muốn đặt chỗ', $booking->id);

		// ask_phone_number
		$ask_phone_number = Intent::where('name', 'ask_phone_number')->first();
		Document::custom_create('số điện thoại của quán là gì?', $ask_phone_number->id);
		Document::custom_create('cho hỏi sđt', $ask_phone_number->id);
		Document::custom_create('cho hỏi số phone', $ask_phone_number->id);
		Document::custom_create('phone number?', $ask_phone_number->id);
		Document::custom_create('cho hỏi sdt của quán', $ask_phone_number->id);
		Document::custom_create('Quán có mấy số điện thoại', $ask_phone_number->id);
		Document::custom_create('Cho tôi hỏi số điện thoại', $ask_phone_number->id);
		Document::custom_create('Cho tôi hỏi số phone?', $ask_phone_number->id);
		Document::custom_create('Phone number là gì?', $ask_phone_number->id);
		Document::custom_create('Tôi không call được số của quán?', $ask_phone_number->id);
		Document::custom_create('SĐT là gì?', $ask_phone_number->id);
		Document::custom_create('Xin số điện thoại', $ask_phone_number->id);
		Document::custom_create('Xin số đt', $ask_phone_number->id);
		Document::custom_create('Tôi không thể liên lạc được với nhà hàng', $ask_phone_number->id);
		Document::custom_create('Tôi liên lạc bằng số nào được?', $ask_phone_number->id);
		Document::custom_create('Tôi nên gọi vào số nào?', $ask_phone_number->id);
		Document::custom_create('Tôi cần biết số điện thoại', $ask_phone_number->id);
		Document::custom_create('Tôi nên gọi vào số nào để liên lạc cho nhà hàng?', $ask_phone_number->id);
		Document::custom_create('Cho mình xin sđt', $ask_phone_number->id);

		// greeting
		$greeting = Intent::where('name', 'greeting')->first();
		Document::custom_create('Xin chào', $greeting->id);
		Document::custom_create('Chào ad', $greeting->id);
		Document::custom_create('Chào admin', $greeting->id);
		Document::custom_create('Hello', $greeting->id);
		Document::custom_create('Hi', $greeting->id);
		Document::custom_create('Helo', $greeting->id);
		Document::custom_create('Xin chào bạn', $greeting->id);
		Document::custom_create('Chào nhé', $greeting->id);
		Document::custom_create('Xin chào ạ', $greeting->id);
		Document::custom_create('Hello bot nhé', $greeting->id);
		Document::custom_create('Hi bot', $greeting->id);
		Document::custom_create('Hello nhà hàng', $greeting->id);
		Document::custom_create('Xin chào nhà hàng', $greeting->id);
		Document::custom_create('Xin chào bạn', $greeting->id);
		Document::custom_create('Hihi chào nhé', $greeting->id);
		Document::custom_create('Hihi xin chào', $greeting->id);
		Document::custom_create('chào nhà hàng nhé', $greeting->id);
		Document::custom_create('Mình xin chào quán nhé', $greeting->id);
		Document::custom_create('Hello nhà hàng', $greeting->id);

		// goodbye
		$goodbye = Intent::where('name', 'goodbye')->first();
		Document::custom_create('tạm biệt', $goodbye->id);
		Document::custom_create('Bye', $goodbye->id);
		Document::custom_create('chào tạm biệt nhé', $goodbye->id);
		Document::custom_create('bye', $goodbye->id);
		Document::custom_create('bye bye', $goodbye->id);
		Document::custom_create('good bye', $goodbye->id);
		Document::custom_create('goodbye', $goodbye->id);
		Document::custom_create('Bye nhé', $goodbye->id);
		Document::custom_create('tạm biệt nhé', $goodbye->id);
		Document::custom_create('hẹn gặp lại', $goodbye->id);
		Document::custom_create('tạm biệt và hẹn gặp lại', $goodbye->id);
		Document::custom_create('see ya', $goodbye->id);
		Document::custom_create('see you again', $goodbye->id);
		Document::custom_create('tạm biệt nhé', $goodbye->id);
		Document::custom_create('tạm biệt quán mình sẽ quay lại sau nhé', $goodbye->id);
		Document::custom_create('tạm biệt và hẹn gặp lại quán trong 1 ngày nào đó', $goodbye->id);
		Document::custom_create('xin tạm biệt. see ya!', $goodbye->id);

		// thank_you
		$thank_you = Intent::where('name', 'thank_you')->first();
		Document::custom_create('cảm ơn nhé', $thank_you->id);
		Document::custom_create('thanks', $thank_you->id);
		Document::custom_create('thank you', $thank_you->id);
		Document::custom_create('ty', $thank_you->id);
		Document::custom_create('tks', $thank_you->id);
		Document::custom_create('thx', $thank_you->id);
		Document::custom_create('cảm ơn', $thank_you->id);
		Document::custom_create('cảm ơn bạn nhé', $thank_you->id);
		Document::custom_create('thanks bạn', $thank_you->id);
		Document::custom_create('xin cảm ơn nhà hàng', $thank_you->id);
		Document::custom_create('thanks so much', $thank_you->id);
		Document::custom_create('cảm ơn nhiều nhé', $thank_you->id);
		Document::custom_create('Xin cảm ơn', $thank_you->id);
		Document::custom_create('Cảm ơn đã trả lời tin nhắn', $thank_you->id);
		Document::custom_create('Cảm ơn đã giúp', $thank_you->id);
		Document::custom_create('Thank you nhiều nhé', $thank_you->id);
		Document::custom_create('Thật sự cảm ơn', $thank_you->id);

		// chat_with_staff
		$chat_with_staff = Intent::where('name', 'chat_with_staff')->first();
		Document::custom_create('tôi muốn chat với nhân viên', $chat_with_staff->id);
		Document::custom_create('cho tôi gặp admin', $chat_with_staff->id);
		Document::custom_create('cho tôi gặp quản lý', $chat_with_staff->id);
		Document::custom_create('cho tôi nói chuyện với nhân viên', $chat_with_staff->id);
		Document::custom_create('cho tôi chat với người thật', $chat_with_staff->id);
		Document::custom_create('nói chuyện với quản lý', $chat_with_staff->id);
		Document::custom_create('chat với admin', $chat_with_staff->id);
		Document::custom_create('chat với người quản lý', $chat_with_staff->id);
		Document::custom_create('cần giúp đỡ', $chat_with_staff->id);
		Document::custom_create('help', $chat_with_staff->id);
		Document::custom_create('tôi cần nói chuyện với nhân viên', $chat_with_staff->id);
		Document::custom_create('cần sự giúp đỡ của nhân viên', $chat_with_staff->id);
		Document::custom_create('cần nói chuyện với chủ quán', $chat_with_staff->id);
		Document::custom_create('chat với người', $chat_with_staff->id);

		// ask_address
		$ask_address = Intent::where('name', 'ask_address')->first();
		Document::custom_create('địa chỉ như nào nhỉ', $ask_address->id);
		Document::custom_create('cho xin địa điểm của quán', $ask_address->id);
		Document::custom_create('cho tôi address', $ask_address->id);
		Document::custom_create('nhà hàng ở đâu nhỉ?', $ask_address->id);
		Document::custom_create('địa chỉ của nhà hàng?', $ask_address->id);
		Document::custom_create('địa điểm của nhà hàng là ở đâu?', $ask_address->id);
		Document::custom_create('tôi cần biết vị trí của nhà hàng', $ask_address->id);
		Document::custom_create('tôi cần biết đường đến nhà hàng', $ask_address->id);
		Document::custom_create('Nhà hàng ở đâu vậy?', $ask_address->id);
		Document::custom_create('Nhà hàng ở chỗ nào?', $ask_address->id);
		Document::custom_create('Cho xin địa chỉ của quán với', $ask_address->id);
		Document::custom_create('Địa chỉ?', $ask_address->id);
		Document::custom_create('Địa chỉ như nào', $ask_address->id);
		Document::custom_create('Vị trí quán?', $ask_address->id);
		Document::custom_create('Cho xin thông tin địa điểm của quán', $ask_address->id);
		Document::custom_create('Cho xin địa chỉ quán', $ask_address->id);
    }
}
