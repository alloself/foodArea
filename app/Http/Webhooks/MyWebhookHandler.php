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

		$keyboard = ReplyKeyboard::make()
			->row([
				ReplyButton::make('Send Contact')->requestContact(),
				ReplyButton::make('Send Location')->requestLocation(),
			])
			->row([
				ReplyButton::make('Quiz')->requestQuiz(),
			]);

		$this->chat->message('hello world')
			->replyKeyboard($keyboard)->send();
	}
}
