<?php

use App\Http\Middleware\FrontNotificationMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([FrontNotificationMiddleware::class])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});


