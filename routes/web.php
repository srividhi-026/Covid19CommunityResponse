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


// homepage
Route::view('/map', 'homepage/map');
Route::view('/team', 'homepage/team');
Route::view('/', 'homepage/homepage');
Route::view('/about', 'homepage/about');
Route::view('/3d-printers','homepage/3dprinters');

// auth forms
Route::view('/register', 'auth_forms/register');
Route::view('/agent_register', 'auth_forms/agent_register_form');

// get requests
Route::get('get_map_data', 'MapController@get_map_data');
Route::get('get_3d_printer_map_data', 'MapController@get_3d_printer_map_data');
Route::get('get_ppe_map_data', 'MapController@get_ppe_map_data');

// post requests
Route::post('do_register', 'RegisterController@do_register');
Route::post('agent_register', 'RegisterController@agent_register');

// policies
Route::view('/privacy_policy', 'policies/privacy_policy');
Route::view('/confidentiality', 'policies/confidentiality');

// agent policies
Route::view('/agent_privacy_policy', 'agent_policies/agent_privacy_policy');
Route::view('/agent_ca', 'agent_policies/agent_confidentiality_agreement');
Route::view('/agent_data_protection_policy', 'agent_policies/agent_data_protection_policy');
Route::view('/cyber_security_checklist', 'agent_policies/agent_cyber_security_checklist');
