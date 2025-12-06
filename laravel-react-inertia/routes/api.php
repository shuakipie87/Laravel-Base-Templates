<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'throttle:api'])->get('/user', function (Request $request) {
    return $request->user();
});

// Example Protected Route with Role Check
Route::middleware(['auth:sanctum', 'role:Admin'])->get('/admin/stats', function () {
    return response()->json(['status' => 'ok']);
});