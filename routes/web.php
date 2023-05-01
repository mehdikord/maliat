<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return 'this is front';
});

Route::get('management', function () {
    return redirect('management/auth');
});

Route::get('management/{any}',static function (){
    return view('manage');
})->where('any','(.*)');

