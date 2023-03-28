<?php


namespace App\Http\Webhooks;

use \DefStudio\Telegraph\Handlers\WebhookHandler;

class MyWebhookHandler extends WebhookHandler
{
    public function hi(string $userName)
    {
        $this->chat->markdown("*Hi* $userName, happy to be here!")->send();
    }
}
