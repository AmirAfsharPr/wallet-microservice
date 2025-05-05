<?php

use App\Http\Controllers\General\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('auth')->group(function (){
    Route::post('/register',[AuthController::class,'register']);
    Route::post('/login',[AuthController::class,'login']);
    Route::post('/forget-password',[AuthController::class,'forgetPassword']);
    Route::post('/reset-password',[AuthController::class,'resetPassword']);
    Route::get('/check',[AuthController::class,'authCheck'])->middleware('auth:sanctum');
});

Route::prefix('app')->middleware('auth:api')->group(function (){

    Route::post('/change-password',[AuthController::class,'changePassword']);
});
