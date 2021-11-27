<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::post('/user/register',[UserController::class,'register']);
Route::post('/user/login',[UserController::class,'login']);
Route::group(['middleware'=>'auth:sanctum'],function(){
    Route::get('/user/profile',[UserController::class,'profile']);
    Route::get('/user/logout',[UserController::class,'logout']);
});

Route::get('/event/all',[EventController::class,'allEvents']);
Route::apiResource('event',EventController::class);
