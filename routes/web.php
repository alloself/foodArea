<?php

use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Models\TelegraphBot;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

	Telegraph::registerBotCommands([
		'hi' => 'hi',
		'start' => 'начать',
		'settings' => 'настройки аккаунта',
		'previous' => 'предыдущий заказ',
		'help' => 'обратная связь',
	])->send();


	$chat = TelegraphChat::find(1);

	// this will use the default parsing method set in config/telegraph.php
	$chat->message('hello')->send();

	$chat->html("<b>hello</b>\n\nI'm a bot!")->send();

	$chat->markdown('*hello*')->send();
	TelegraphBot::all()->map(function ($bot){
		$bot->registerWebhook()->send();
	});
	Http::post('https://api.telegram.org/bot6185228090:AAFSpvou7vqC0wMF1dfit8ps_bXWP2eb1Y0/getMe');



	return view('welcome');
});
