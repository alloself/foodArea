<?php


namespace App\Http\Webhooks;

use \DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

class MyWebhookHandler extends WebhookHandler
{
	public function start()
	{
		$this->chat->message("Главное меню")->keyboard(Keyboard::make()->buttons([
			Button::make('Delete')->action('delete')->param('id', '42'),
			Button::make('open')->url('https://test.it'),
			Button::make('Web App')->webApp('https://web-app.test.it'),
			Button::make('Login Url')->loginUrl('https://loginUrl.test.it'),
		]))->send();
	}
}
