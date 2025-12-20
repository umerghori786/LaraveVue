<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PrecController;
use App\Http\Controllers\SpatieController;
use App\Http\Controllers\ExcelController;







Route::get('service',[ServiceController::Class,'index']);
Route::get('service-container',[ServiceController::Class,'service']);
Route::get('cache',[ServiceController::class,'cache']);
Route::get('products',ProductController::class);
Route::get('pipelines',[PrecController::class,'index']);
Route::get('spatie',[SpatieController::class,'index']);
Route::get('excel/export',[ExcelController::class,'export'])->name('excelExport');
Route::get('excel/import',[ExcelController::class,'import'])->name('excelImport');
Route::post('excel/import',[ExcelController::class,'importSheet'])->name('Import');









Route::get('/{any?}', function () {
    return view('welcome');
})->where('any', '^(?!api\/)[\/\w\.\,-]*');
