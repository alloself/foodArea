<?php


namespace App\Http\Webhooks;

use \DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;
use DefStudio\Telegraph\Keyboard\Keyboard;

class MyWebhookHandler extends WebhookHandler
{
	public function start()
	{

		$this->chat->message('Главное меню')->replyKeyboard(ReplyKeyboard::make()->row([
			ReplyButton::make('☕️ Кофейни')->requestPoll(),
		])->row([
			ReplyButton::make('🌐 Поделиться')->requestQuiz(),
			ReplyButton::make('⚙️ Настройки')->webApp('https://webapp.dev'),
		])->oneTime())->send();
	}
}
