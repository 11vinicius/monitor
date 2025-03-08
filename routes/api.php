<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;


Route::post('/signIn', [AuthController::class, 'signIn']);

Route::post('/user', [UserController::class, 'store']);

Route::group(['prefix'=>'user'], function () {
    Route::get('/', [UserController::class, 'index']);  
    Route::get('/{id}', [UserController::class, 'show']);  
    Route::put('/{id}', [UserController::class, 'update']);  
    Route::delete('/{id}', [UserController::class, 'destroy']);

})->middleware('auth:sanctum');
