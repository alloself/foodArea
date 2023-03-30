<?php


namespace App\Http\Webhooks;

use \DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;
use DefStudio\Telegraph\Keyboard\Keyboard;
use Illuminate\Support\Stringable;

class MyWebhookHandler extends WebhookHandler
{
	public function start()
	{

		$this->chat->message('Главное меню')->replyKeyboard(ReplyKeyboard::make()->row([
			ReplyButton::make('☕️ Кофейни'),
		])->row([
			ReplyButton::make('🌐 Поделиться'),
			ReplyButton::make('⚙️ Настройки'),
		]))->send();
	}
	protected function handleChatMessage(Stringable $text): void
	{

		if ($text == '⚙️ Настройки') {
			$this->chat->html("⚙️ Настройки\n\nЗдесь можете настроить Ваш аккаунт или посмотреть статистику покупок:")->keyboard(Keyboard::make()->row([
				Button::make('☕️ Кофейни')->action('delete')->param('id', '42'),
			])->row([
				Button::make('🌐 Поделиться')->action('delete')->param('id', '42'),
				Button::make('⚙️ Настройки')->action('delete')->param('id', '42'),
			]))->send();
		}
		if ($text == '🌐 Поделиться') {
			$this->chat->html("🌐 Поделиться\n\nВы можете поделиться нашим ботом со своими друзьями, или в Вашем канале:")->keyboard(Keyboard::make()->row([
				Button::make('🌐 Поделиться ботом')->action('delete')->param('id', '42'),
			]))->send();
		}

		if ($text == '☕️ Кофейни') {
			$this->chat->html("☕️ Кофейни. \n\n ⚡️ Вам доступна акция за вход – любая покупка со скидкой 35%! (3 шт.)")->replyKeyboard(ReplyKeyboard::make()->buttons([
				ReplyButton::make('📍 1-ая Красноармейская, 15'),
				ReplyButton::make('📍 1-ая Красноармейская, 15'),
				ReplyButton::make('◀️ Назад'),
			]))->send();
		}
		if ($text == '◀️ Назад') {
			$this->start();
		}
		if($text == '📍 1-ая Красноармейская, 15'){
			$this->chat->html("📍 1-ая Красноармейская, 15\n\n🕐 Закрыто: 09:00 － 21:00")->send();
		}
	}
}
