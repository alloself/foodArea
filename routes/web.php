<?php

use DefStudio\Telegraph\Facades\Telegraph;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

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
	Telegraph::message('test')->dd();
	Log::alert(Telegraph::chatMemberCount()->send());
	

	return view('welcome');
});
