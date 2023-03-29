<?php


namespace App\Http\Webhooks;

use \DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;
use DefStudio\Telegraph\Keyboard\Keyboard;

class MyWebhookHandler extends WebhookHandler
{
	public function start()
	{

		$this->chat->message('Главное меню')->keyboard(Keyboard::make()->row([
			Button::make('☕️ Кофейни')->action('delete')->param('id', '42'),
		])->row([
			Button::make('🌐 Поделиться')->action('delete')->param('id', '42'),
			Button::make('⚙️ Настройки')->action('delete')->param('id', '42'),
		]))->send();
	}
}
