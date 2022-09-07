<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeCarController;
use App\Http\Controllers\HomeBrandController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::controller(HomeCarController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
    Route::get('/regitrar_vehiculo', 'create')->name('home.create');
    Route::get('/detalle_vehiculo/{car_id}', 'show')->name('home.show');
    Route::get('/editar_vehiculo/{car_id}', 'edit')->name('home.edit');
});

Route::controller(HomeBrandController::class)->group(function () {
    Route::get('/marcas', 'index')->name('brand.index');
    Route::get('/regitrar_marca', 'create')->name('brand.create');
    Route::get('/detalle_marca/{brand_id}', 'show')->name('brand.show');
});


