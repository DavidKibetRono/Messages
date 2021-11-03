<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyMessageController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Home2Controller;

use App\Http\Controllers\NexmoSMSController;
use Nexmo\Laravel\Facade\Nexmo;



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

Route::get('/hhh', function () {
    return view('auth.login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post("/message", [MyMessageController::class, "message"]);

//Route::post('/message','MyMessageController@message');



Route::get('send-sms-notification', [NotificationController::class, 'sendSmsNotificaition']);


Route::get('sms', [RoomController::class, 'index']);

Route::get('send-sms', [NexmoSMSController::class, 'index']);


Route::get('/', [Home2Controller::class,'index']);
Route::post('/mine',  [Home2Controller::class,'store']);
Route::post('/custom',  [Home2Controller::class,'sendCustomMessage']);