<?php


namespace App\Http\Webhooks;

use \DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;
use DefStudio\Telegraph\Keyboard\Keyboard;

class MyWebhookHandler extends WebhookHandler
{

	public static $mainMenuReplyKeyboard = ReplyKeyboard::make()->row([
		ReplyButton::make('☕️ Кофейни')->requestPoll(),
	])->row([
		ReplyButton::make('🌐 Поделиться')->requestQuiz(),
		ReplyButton::make('⚙️ Настройки')->webApp('https://webapp.dev'),
	]);




	public function start()
	{
		$this->chat->message('Главное меню')->replyKeyboard($this->mainMenuReplyKeyboard)->send();
		$this->chat->reply("Notification dismissed");
	}
}
