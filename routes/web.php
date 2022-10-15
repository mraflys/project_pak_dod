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

    Route::get('/detail/{id}/{konteks}', 'kelolaPengetahuanController@detail')->name('pengetahuan.detail');

    Route::get('/download/{id}', 'kelolaPengetahuanController@download')->name('pengetahuan.download');

    Route::get('/hapusfile/{id}/{konteks}', 'kelolaPengetahuanController@hapusfile')->name('pengetahuan.hapusfile');

    Route::post('/update', 'kelolaPengetahuanController@update')->name('pengetahuan.update');

    Route::get('/delete/{id}', 'kelolaPengetahuanController@delete')->name('pengetahuan.delete');
});

Route::group(['prefix' => 'dokumen', 'middleware' => []], function() {
    Route::get('/index', 'kelolaDokumenController@index')->name('dokumen');

    Route::post('/store', 'kelolaDokumenController@store')->name('dokumen.store');

    Route::get('/list', 'kelolaDokumenController@list')->name('dokumen.list');

    Route::get('/detail/{id}/{konteks}', 'kelolaDokumenController@detail')->name('dokumen.detail');

    Route::get('/delete/{id}', 'kelolaDokumenController@delete')->name('dokumen.delete');

    Route::get('/hapusfile/{id}/{konteks}', 'kelolaDokumenController@hapusfile')->name('dokumen.hapusfile');

    Route::get('/download/{id}', 'kelolaDokumenController@download')->name('dokumen.download');

    Route::post('/update', 'kelolaDokumenController@update')->name('dokumen.update');
});

Route::group(['prefix' => 'diskusi', 'middleware' => []], function() {
    Route::get('/index', 'kelolaDiskusiController@index')->name('diskusi');

    Route::post('/store', 'kelolaDiskusiController@store')->name('diskusi.store');

    Route::get('/list', 'kelolaDiskusiController@list')->name('diskusi.list');

    Route::get('/detail/{id}/{konteks}', 'kelolaDiskusiController@detail')->name('diskusi.detail');

    Route::get('/delete/{id}', 'kelolaDiskusiController@delete')->name('diskusi.delete');

    Route::get('/hapusfile/{id}/{konteks}', 'kelolaDiskusiController@hapusfile')->name('diskusi.hapusfile');

    Route::get('/download/{id}', 'kelolaDiskusiController@download')->name('diskusi.download');

    Route::post('/update', 'kelolaDiskusiController@update')->name('diskusi.update');

    Route::post('/store/komentar', 'kelolaDiskusiController@store_komentar')->name('diskusi.store.komentar');
});

Route::group(['prefix' => 'user', 'middleware' => []], function() {
    Route::get('/index', 'kelolaUserController@index')->name('user');

    Route::get('/list', 'kelolaUserController@list')->name('user.list');

    Route::post('/store', 'kelolaUserController@store')->name('user.store');

    Route::get('/detail/{id}/{konteks}', 'kelolaUserController@detail')->name('user.detail');

    Route::get('/delete/{id}', 'kelolaUserController@delete')->name('user.delete');

    Route::post('/update', 'kelolaUserController@update')->name('user.update');

    Route::post('/store/komentar', 'kelolaUserController@store_komentar')->name('user.store.komentar');
});