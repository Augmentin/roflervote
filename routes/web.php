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

Route::prefix("/kek/")->group(
    function (){
        Route::get('/collection/{id}', [\App\Http\Controllers\Vote\Collection::class , "getMusic"]);




        Route::post('/collection/image/', [\App\Http\Controllers\Vote\Collection::class , "postImage"]);
        Route::get('/collection/image/{id}', [\App\Http\Controllers\Vote\Collection::class , "getImage"]);
    }
);


Route::get('/', [\App\Http\Controllers\Vote\Collection::class , "getMainView"]);

