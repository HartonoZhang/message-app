<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;


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
    return view('message');
});

Route::get('/message', function() {
    return view('message');
});

Route::post('/message', [MessageController::class, 'sendmessage']);

Route::post('/webhooks/status', [MessageController::class, 'status']);
Route::post('/webhooks/inbound', [MessageController::class, 'inbound']);