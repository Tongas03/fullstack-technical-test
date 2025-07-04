<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\PaymentController;

Route::get('/ping', function () {
    return ['pong' => true];
});

Route::post('/cards', [CardController::class, 'store']);
Route::post('/payments', [PaymentController::class, 'store']);