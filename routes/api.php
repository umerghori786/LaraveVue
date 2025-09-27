<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->prefix('user')->group(function(){

    Route::get('checkauth',[AuthController::class,'checkAuth'])->name('checkAuth');
    
});


Route::post('/contact-us',[ContactUsController::Class,'store']);

/*=====================================AUTH ROUTE=====================================*/
/*====================================================================================*/

Route::post('user/register',[AuthController::Class,'Register']);
Route::post('user/login',[AuthController::Class,'Login']);
