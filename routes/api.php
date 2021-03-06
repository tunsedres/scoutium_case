<?php

use Illuminate\Support\Facades\Route;

/** Token free paths */
Route::post('/register', ["\App\Http\Controllers\Api\Auth\RegisterController", "register"]);
Route::post('/login', ["\App\Http\Controllers\Api\Auth\LoginController", "login"]);


/** Token guarded paths */
Route::middleware('auth:sanctum')->group(function (){

    Route::get('/getUser', ["\App\Http\Controllers\Api\User\UserController", "getUser"]);

    Route::post('/send-invitation', ["\App\Http\Controllers\InvitationController", "sendInvitation"]);

});
