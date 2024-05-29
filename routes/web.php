<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebhooksController;
use Svix\Webhook;
use Svix\Exception\WebhookVerificationException;
use Illuminate\Http\Request;
use App\Http\Controllers\paymentController;
use App\Events\Notification;
Route::get('/', function () {
    return view('welcome');
});

//..Route::webhooks('test');
Route::stripeWebhooks('stripe-webhook');

Route::get('testEvent', function(){
    event(new Notification('halo'));
    return 'Done';

});
Route::post('test',[paymentController::class,'test']);