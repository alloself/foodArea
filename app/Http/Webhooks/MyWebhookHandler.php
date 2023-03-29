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

		$this->chat->message('hello world')->send();
	}
}
