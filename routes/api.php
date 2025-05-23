<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\LoginController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//post
Route::apiResource('/user', PostController::class);
Route::apiResource('/barang', BarangController::class);

Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::get('userdetails', 'userDetails');
});
