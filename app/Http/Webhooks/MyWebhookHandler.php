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
		])->oneTime())->send();
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

		/*
		->keyboard(Keyboard::make()->buttons([
					Button::make('Delete')->action('delete')->param('id', '42'),
					Button::make('open')->url('https://test.it'),
					Button::make('Web App')->webApp('https://web-app.test.it'),
					Button::make('Login Url')->loginUrl('https://loginUrl.test.it'),
				]))
			*/
	}
}
