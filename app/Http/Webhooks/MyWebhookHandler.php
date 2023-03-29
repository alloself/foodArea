<?php


namespace App\Http\Webhooks;

use \DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

class MyWebhookHandler extends WebhookHandler
{
	public function start()
	{
		$this->chat->message("Главное меню")->replyKeyboard(function (Keyboard $keyboard) {
			return $keyboard
				->button('foo')->requestPoll()
				->button('bar')->requestQuiz()
				->button('baz')->webApp('https://webapp.dev');
		})->send();
	}
}
