<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OwnershipController;
use App\Http\Controllers\CattleController;

Route::post('/signIn', [AuthController::class, 'signIn']);
Route::post('/user', [UserController::class, 'store']);


Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'cattle'], function () {
    Route::get('/', [CattleController::class, 'index']); 
  
});

Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'ownership'], function () {
    Route::get('/', [OwnershipController::class, 'index']); 
    Route::put('/{id}', [OwnershipController::class, 'update']);  
    Route::get('/{id}', [OwnershipController::class, 'show']); 
    Route::post('/', [OwnershipController::class, 'store']); 
    Route::delete('/{id}', [OwnershipController::class, 'destroy']);
});

Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'user'], function () {    Route::get('/', [UserController::class, 'index']);  
    Route::get('/{id}', [UserController::class, 'show']);  
    Route::put('/{id}', [UserController::class, 'update']);  
    Route::delete('/{id}', [UserController::class, 'destroy']);
});


