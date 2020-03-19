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

Route::get('/', function () {
    return view('homepage');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/map', function () {
    return view('map');
});

Route::get('get_map_data', 'MapController@get_map_data');
Route::post('do_register', 'RegisterController@do_register');

Route::view('/privacy_policy', 'policies/privacy_policy');
Route::view('/confidentiality', 'policies/confidentiality');
Route::view('/about', 'policies/about');
