<?php

use DefStudio\Telegraph\Enums\ChatActions;
use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Models\TelegraphBot;
use Illuminate\Support\Facades\Route;
use DefStudio\Telegraph\Models\TelegraphChat;

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
		'start' => 'начать',
		'settings' => 'настройки аккаунта',
		'previous' => 'предыдущий заказ',
		'help' => 'обратная связь',
	])->send();

	return view('welcome');
});
