<?php

use DefStudio\Telegraph\Facades\Telegraph;
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
    Telegraph::botInfo()->send();
    return view('welcome');
});
