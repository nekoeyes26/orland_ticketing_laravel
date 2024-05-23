<?php

use App\Http\Controllers\RajaOngkirController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/rajaongkir/province', [RajaOngkirController::class, 'getProvince'])->name('api.rajaongkir.getprovince');
Route::post('/rajaongkir/city', [RajaOngkirController::class, 'getCity'])->name('api.rajaongkir.getcity');
Route::post('/rajaongkir/fee', [RajaOngkirController::class, 'getFee'])->name('api.rajaongkir.getfee');