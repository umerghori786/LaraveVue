<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;







Route::get('service',[ServiceController::Class,'index']);
Route::get('service-container',[ServiceController::Class,'service']);
Route::get('cache',[ServiceController::class,'cache']);










Route::get('/{any?}', function () {
    return view('welcome');
})->where('any', '^(?!api\/)[\/\w\.\,-]*');
