<?php

use App\Http\Controllers\Quest;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/', [TestController::class, 'create']);
Route::get('/', [TestController::class, 'index']);
Route::put('/', [TestController::class, 'edit']);
Route::delete('/', [TestController::class, 'delete']);
Route::get('/display', [TestController::class, 'display']);
Route::post('/user', [TestController::class, 'create_user']);



Route::post('/quest', [Quest::class, 'create_quest']);
Route::get('/quest', [Quest::class, 'list_quest']);


//index
Route::put('/index', [Quest::class, 'update_index']);



