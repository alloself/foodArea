<?php


namespace App\Http\Webhooks;

use DefStudio\Telegraph\DTO\User;
use \DefStudio\Telegraph\Handlers\WebhookHandler;
use Illuminate\Support\Stringable;

class MyWebhookHandler extends WebhookHandler
{
    public function hi(string $userName)
    {
        $this->chat->markdown("*Hi* $userName, happy to be here!")->send();
    }

    protected function handleUnknownCommand(Stringable $text): void
    {
        if (!self::$handleUnknownCommands) {
            parent::handleUnknownCommand($text);
        }

        $this->chat->html("I can't understand your command: $text")->send();
    }

    protected function handleChatMemberJoined(User $member): void
    {
        $this->chat->html("Welcome {$member->firstName()}")->send();
    }
}
