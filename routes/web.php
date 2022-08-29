<?php

use App\Http\Livewire\Admin;
use App\Http\Livewire\Chats;
use App\Http\Livewire\ErrConnect;
use App\Http\Livewire\ListQuest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/chats',Chats::class);
Route::get('/not-connect',ErrConnect::class)->name('not-connect');
Route::get('/list-quest',ListQuest::class)->name('list-quest');

Route::get('/admin',Admin::class)->name('admin');

