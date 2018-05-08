<?php

use Illuminate\Database\Seeder;
use App\Intent;
use App\Document;
class BookingIntentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// booking
		$booking = Intent::where('name', 'booking')->first();
		Document::custom_create('Cho tôi đặt bàn (đặt chỗ) được không', $booking->id);
		Document::custom_create('Cho đặt chỗ (đặt bàn) được không', $booking->id);
		Document::custom_create('Nhà hàng có nhận đặt bàn (đặt chỗ, book) trước không?', $booking->id);
		Document::custom_create('Quán có nhận đặt bàn (đặt chỗ, book) trước không?', $booking->id);
		Document::custom_create('Tôi muốn book (đặt bàn, đặt chỗ) 2 bàn cho 8 người ăn', $booking->id);
		Document::custom_create('Tôi muốn đặt bàn (đặt chỗ, book)', $booking->id);
		Document::custom_create('Tôi muốn đặt chỗ (book, đặt bàn)', $booking->id);
		Document::custom_create('Tớ muốn đặt (đặt chỗ, đặt bàn, book) cho 10 người ăn', $booking->id);
		Document::custom_create('Nhà hàng có chỗ cho 20 người không?', $booking->id);
		Document::custom_create('Quán có chỗ cho 40 người và 5 trẻ nhỏ không?', $booking->id);
		Document::custom_create('Tôi muốn book (đặt bàn, đặt chỗ) 10 bàn', $booking->id);
		Document::custom_create('Tôi muốn đặt chỗ (đặt bàn, book) cho 20 người', $booking->id);
		Document::custom_create('Tôi cần bàn (book, đặt bàn, đặt chỗ) cho 30 người', $booking->id);
		Document::custom_create('Tôi cần 2 bàn ăn sinh nhật', $booking->id);
		Document::custom_create('Giờ này còn nhận đặt bàn (đặt chỗ, book) không?', $booking->id);
		Document::custom_create('Tôi muốn đặt bàn (đặt chỗ, book) ngay bây giờ', $booking->id);
		Document::custom_create('Tôi muốn book (đặt bàn, đặt chỗ) chỗ ngày mai', $booking->id);
		Document::custom_create('Tôi muốn đặt bàn (đặt chỗ, book) vào tối nay', $booking->id);
		Document::custom_create('Tôi cần chỗ (đặt bàn, book) để ăn uống', $booking->id);
		Document::custom_create('Tôi cần bàn (chỗ) để ăn uống', $booking->id);
		Document::custom_create('Cho tớ đặt bàn (Đặt chỗ, book) với', $booking->id);
		Document::custom_create('Đặt chỗ (đặt bàn, book) trước được không vậy?', $booking->id);
		Document::custom_create('Tôi muốn đặt chỗ (đặt bàn, book)', $booking->id);
    }
}
