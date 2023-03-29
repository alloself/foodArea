<?php


namespace App\Http\Webhooks;

use \DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

class MyWebhookHandler extends WebhookHandler
{
	public function start()
	{
		$this->chat->message("Главное меню")->keyboard(function (Keyboard $keyboard) {
			return $keyboard
				->button('Delete')->action('delete')->param('id', '42')
				->button('open')->url('https://test.it')
				->button('Web App')->webApp('https://web-app.test.it')
				->button('Login Url')->loginUrl('https://loginUrl.test.it');
		})->send();
	}
}
