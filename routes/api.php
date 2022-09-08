<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ModelOfBrandController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::apiResource('cars', CarController::class);
Route::apiResource('models', ModelOfBrandController::class);
Route::apiResource('brands', BrandController::class);
Route::get('/show_by_brand/{brand_id}', [ModelOfBrandController::class, 'showByBrand']);
