<?php

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



Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/registerasi', 'Auth\RegisterController@index')->name('registerasi');

Route::group(['prefix' => 'pengetahuan', 'middleware' => []], function() {
    Route::get('/index', 'kelolaPengetahuanController@index')->name('pengetahuan');

    Route::get('/list', 'kelolaPengetahuanController@list')->name('pengetahuan.list');

    Route::post('/store', 'kelolaPengetahuanController@store')->name('pengetahuan.store');

    Route::get('/delete/{id}', 'kelolaPengetahuanController@delete')->name('pengetahuan.delete');
});

Route::group(['prefix' => 'dokumen', 'middleware' => []], function() {
    Route::get('/index', 'kelolaDokumenController@index')->name('dokumen');

    Route::post('/store', 'kelolaDokumenController@store')->name('dokumen.store');
});
