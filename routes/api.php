<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('book', 'BookController@book');

Route::get('bookall', 'BookController@bookAuth')->middleware('jwt.verify');
Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');

Route::middleware('auth')->group(function(){

});


Route::middleware('auth:api')->group(function (){
    // mahasiswa
    Route::put('update-mahasiswa/{id}', 'MahasiswaController@update');
    Route::delete('delete-mahasiswa/{id}', 'MahasiswaController@destroy');
    Route::post('create-mahasiswa', 'MahasiswaController@store');

    // buku
    Route::put('update-buku/{id}', 'BukuController@update');
    Route::delete('delete-buku/{id}', 'BukuController@destroy');
    Route::post('create-buku', 'BukuController@store');

    // pinjaman
    Route::put('update-pinjaman/{id}', 'PinjamanController@update');
    Route::delete('delete-pinjaman/{id}', 'PinjamanController@destroy');
    Route::post('create-pinjaman', 'PinjamanController@store');
});

Route::middleware('auth:api')->group(function (){
    Route::get('mahasiswa', 'MahasiswaController@index');
    Route::get('mahasiswa/{id}', 'MahasiswaController@show');
    Route::get('buku', 'BukuController@index');
    Route::get('buku/{id}', 'BukuController@show');
    Route::get('pinjaman', 'PinjamanController@index');
    Route::get('pinjaman/{id}', 'PinjamanController@show');
});
