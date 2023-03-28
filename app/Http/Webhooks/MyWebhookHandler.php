<?php


namespace App\Http\Webhooks;

use DefStudio\Telegraph\DTO\User;
use \DefStudio\Telegraph\Handlers\WebhookHandler;
use Illuminate\Support\Facades\Log;

class MyWebhookHandler extends WebhookHandler
{
	protected function handleChatMemberJoined(User $member): void
	{
			Log::debug(123);
      $this->chat->html("Welcome {$member->firstName()}")->send();
	}
}
