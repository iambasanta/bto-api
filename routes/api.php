<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::post('/user/register',[UserController::class,'register']);
Route::post('/user/login',[UserController::class,'login']);

Route::group(['middleware'=>'auth:sanctum'],function(){
    Route::get('/user/profile',[UserController::class,'profile']);
    Route::get('/user/logout',[UserController::class,'logout']);

    // routes for payment transaction with stripe
    Route::post('/payment/{event}',[PaymentController::class,'payment']);

    // route to fetch tickets purchased by user
    Route::get('/user/tickets',[TicketController::class,'index']);

    // route to fetch payments history of user
    Route::get('/user/payments',[PaymentController::class,'index']);
});

Route::get('/event/all',[EventController::class,'allEvents']);
Route::apiResource('event',EventController::class);

