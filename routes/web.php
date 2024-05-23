<?php

use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\EventController@home')->name('home');
Route::get('jelajah', 'App\Http\Controllers\EventController@jelajah')->name('jelajah');

Route::get('/admin/event', 'App\Http\Controllers\EventController@index')->name('admin_event.index');
Route::get('/admin/event/create', 'App\Http\Controllers\EventController@create')->name('admin_event.create');
Route::post('/admin/event/store', 'App\Http\Controllers\EventController@store')->name('admin_event.store');
Route::get('/admin/event/edit/{id}', 'App\Http\Controllers\EventController@edit')->name('admin_event.edit');
Route::post('/admin/event/update/{id}', 'App\Http\Controllers\EventController@update')->name('admin_event.update');
Route::get('/admin/event_1', 'App\Http\Controllers\EventController@belumAdaTiket')->name('admin_event.belumAdaTiket');
Route::get('/admin/event_2', 'App\Http\Controllers\EventController@tersedia')->name('admin_event.tersedia');
Route::get('/admin/event_3', 'App\Http\Controllers\EventController@lampau')->name('admin_event.lampau');

Route::get('/admin/tiket', 'App\Http\Controllers\TiketController@index')->name('admin_tiket.index');
Route::get('/admin/tiket/create', 'App\Http\Controllers\TiketController@create')->name('admin_tiket.create');
Route::post('/admin/tiket/store', 'App\Http\Controllers\TiketController@store')->name('admin_tiket.store');
Route::get('/admin/tiket/edit/{id}', 'App\Http\Controllers\TiketController@edit')->name('admin_tiket.edit');
Route::post('/admin/tiket/update/{id}', 'App\Http\Controllers\TiketController@update')->name('admin_tiket.update');
Route::get('/admin/tiket_1', 'App\Http\Controllers\TiketController@tersedia')->name('admin_tiket.tersedia');
Route::get('/admin/tiket_2', 'App\Http\Controllers\TiketController@tidakTersedia')->name('admin_tiket.tidakTersedia');

Route::get('/admin/user', 'App\Http\Controllers\UsersController@indexUser')->name('admin_user.user');
Route::get('/admin/user_1', 'App\Http\Controllers\UsersController@indexCreator')->name('admin_user.creator');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [LoginController::class, 'register'])->name('auth.register');
Route::post('/register', [LoginController::class, 'store'])->name('auth.store');

Route::get('/admin/register', [AdminAccountController::class, 'register'])->name('admin.register');
Route::post('/admin/register', [AdminAccountController::class, 'store'])->name('admin.store');

Route::get('creator/event', 'App\Http\Controllers\EventController@indexCreator')->name('creator_event.index');
Route::get('creator/event/create', 'App\Http\Controllers\EventController@creatorCreate')->name('creator.create.event');
Route::post('creator/event/store', 'App\Http\Controllers\EventController@creatorStore')->name('creator.store.event');
Route::get('creator/event/edit/{id}', 'App\Http\Controllers\EventController@creatorEdit')->name('creator.edit.event');
Route::post('creator/event/update/{id}', 'App\Http\Controllers\EventController@creatorUpdate')->name('creator.update.event');

Route::get('/creator/tiket/create/{id}', 'App\Http\Controllers\TiketController@createCreator')->name('creator_tiket.create.id');
Route::post('/creator/tiket/store', 'App\Http\Controllers\TiketController@storeCreator')->name('creator_tiket.store');
Route::get('/creator/tiket/edit/{id}', 'App\Http\Controllers\TiketController@editCreator')->name('creator_tiket.edit');
Route::post('/creator/tiket/update/{id}', 'App\Http\Controllers\TiketController@updateCreator')->name('creator_tiket.update');

Route::get('/event/search', 'App\Http\Controllers\EventController@search')->name('event.search');
Route::get('event/{id}', 'App\Http\Controllers\EventController@detailEvent')->name('event.detail');

Route::get('event/{id_event}/billing/{id_tiket}', 'App\Http\Controllers\PembelianController@toBilling')->name('event.billing');
Route::post('event/purchase/store', 'App\Http\Controllers\PembelianController@store')->name('pembelian.store');
Route::get('tiket-saya', 'App\Http\Controllers\TiketUserController@userTicket')->name('user.ticket');
Route::post('tiket-saya/update/{id}', 'App\Http\Controllers\TiketUserController@update')->name('user.tiket.update');

Route::get('detail_akun', 'App\Http\Controllers\UsersController@account')->name('user.account');
Route::post('detail_akun/update', 'App\Http\Controllers\UsersController@updateInfo')->name('user.update');
Route::get('creator/register', 'App\Http\Controllers\UsersController@mauCreator')->name('creator.register');
Route::post('creator/store', 'App\Http\Controllers\UsersController@jadiCreator')->name('creator.store');

Route::get('riwayat_pembelian', 'App\Http\Controllers\PembelianController@riwayatPembelianUser')->name('user.pembelian');