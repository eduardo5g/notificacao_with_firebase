<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PushSubscriptionController;
use App\Http\Controllers\NotificationController;

Route::middleware('auth')->group(function () {

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/list', function () {
    return view('layouts.listen');
})->name('/layouts.listen');


Route::post('/subscribe', [PushSubscriptionController::class, 'subscribe'])
->name('subscribe');

Route::get('/form-subscription', [PushSubscriptionController::class, 'formSubscription'])
->name('formSubscription');
// ->middleware('auth:api');

Route::post('/save-subscription', [PushSubscriptionController::class, 'saveSubscription'])
->name('save-subscription');
// ->middleware('auth:api');


Route::get('/send-notification', [NotificationController::class, 'sendNotification']);

});

require __DIR__ . '/auth.php';
