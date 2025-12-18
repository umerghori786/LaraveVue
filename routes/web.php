<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PrecController;
use App\Http\Controllers\SpatieController;








Route::get('service',[ServiceController::Class,'index']);
Route::get('service-container',[ServiceController::Class,'service']);
Route::get('cache',[ServiceController::class,'cache']);
Route::get('products',ProductController::class);
Route::get('pipelines',[PrecController::class,'index']);
Route::get('spatie',[SpatieController::class,'index']);










Route::get('/{any?}', function () {
    return view('welcome');
})->where('any', '^(?!api\/)[\/\w\.\,-]*');
