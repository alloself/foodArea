<?php


namespace App\Http\Webhooks;

use \DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;
use DefStudio\Telegraph\Keyboard\Keyboard;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Stringable;
use DefStudio\Telegraph\DTO\InlineQuery;
use DefStudio\Telegraph\DTO\InlineQueryResultPhoto;
use DefStudio\Telegraph\DTO\InlineQueryResultArticle;

class MyWebhookHandler extends WebhookHandler
{
	public function start()
	{

		$this->chat->message('Главное меню')->replyKeyboard(ReplyKeyboard::make()->row([
			ReplyButton::make('☕️ Кофейни'),
		])->row([
			ReplyButton::make('🌐 Поделиться'),
			ReplyButton::make('⚙️ Настройки'),
		]))->send();
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

		if ($text == '☕️ Кофейни') {
			$this->chat->html("☕️ Кофейни. \n\n ⚡️ Вам доступна акция за вход – любая покупка со скидкой 35%! (3 шт.)")->replyKeyboard(ReplyKeyboard::make()->buttons([
				ReplyButton::make('📍 1-ая Красноармейская, 15'),
				ReplyButton::make('📍 1-ая Красноармейская, 15'),
				ReplyButton::make('◀️ Назад'),
			]))->send();
		}
		if ($text == '◀️ Назад') {
			$this->start();
		}
		if ($text == '📍 1-ая Красноармейская, 15') {
			$response = $this->chat->html("<a>📍 1-ая Красноармейская, 15</a>\n\n🕐 Закрыто: 09:00 － 21:00")->send();
			$messageId = $response->telegraphMessageId();
			$this->chat->location(12.345, -54.321)->reply($messageId)->keyboard(Keyboard::make()->buttons([
				Button::make('Меню')->switchInlineQuery('foo')->currentChat(),
				Button::make('Показать список кофеен')->action('delete')->webApp('https://food.bustion.ru'),
			]))->send();
		}
	}
	public function openRestMenu()
	{
		$this->chat->answerInlineQuery('42', [
			InlineQueryResultPhoto::make('42' . "-light", "https://logofinder.dev/'42'/light.jpg", "https://logofinder.dev/'42'/light/thumb.jpg")
				->caption('Light Logo'),
			InlineQueryResultPhoto::make('42' . "-dark", "https://logofinder.dev/'42'/dark.jpg", "https://logofinder.dev/'42'/dark/thumb.jpg")
				->caption('Dark Logo'),
		])->cache(seconds: 600)->send();

		$this->reply('Главное меню');
	}


	public function handleInlineQuery(InlineQuery $inlineQuery): void
	{

		$query = $inlineQuery->query(); // "pest logo"


		$this->bot->answerInlineQuery($inlineQuery->id(), [
			InlineQueryResultArticle::make("1", "test", "test")->thumbUrl("https://vsegda-pomnim.com/uploads/posts/2022-04/1648948908_9-vsegda-pomnim-com-p-ussuriiskii-tigr-v-taige-foto-9.jpg"),
		])->send();
	}
}
