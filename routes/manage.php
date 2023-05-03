<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Management Routes
|--------------------------------------------------------------------------
|
| all management (admins) routes is here
|
*/

//Authenticate
Route::prefix('auth')->group(function (){
    Route::post('login',[\App\Http\Controllers\Manage\Auth\AuthController::class,'manage_login'])->name('auth.login');
});

//enable auth middleware for authenticate
Route::middleware('auth:admin')->group(function (){

    Route::prefix('me')->group(function (){
        Route::get('',[\App\Http\Controllers\Manage\Profile\ProfileController::class,'me'])->name('me');

    });



});


