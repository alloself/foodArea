<?php


namespace App\Http\Webhooks;

use \DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;
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
		])->oneTime())->send();
	}
	protected function handleChatMessage(Stringable $text): void
	{

		switch ($text) {
			case '⚙️ Настройки': {
					$this->chat->html("⚙️ Настройки\n\nЗдесь можете настроить Ваш аккаунт или посмотреть статистику покупок:")->send();
					break;
				}
		}
	}
}
