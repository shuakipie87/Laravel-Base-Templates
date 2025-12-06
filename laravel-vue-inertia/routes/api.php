<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'throttle:programmatic'])->get('/user', function (Request $request) {
    return $request->user();
});