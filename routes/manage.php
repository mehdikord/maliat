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

