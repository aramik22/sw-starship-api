<?php

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

Route::get('show_all_starships','StarshipController@show_all_starships')->name("show_all_starships");
Route::get('show_starship', 'StarshipController@show_starship')->name("show_starship");
Route::get('get_total_count_starship', 'StarshipController@get_total_count_starship')->name("get_total_count_starship");
Route::get('show_all_vehicles','VehicleController@show_all_vehicles')->name("show_all_vehicles");
Route::get('show_vehicle', 'VehicleController@show_vehicle')->name("show_vehicle");
Route::get('get_total_count_vehicle', 'VehicleController@get_total_count_vehicle')->name("get_total_count_vehicle");
Route::put('set_total_count_vehicle', 'VehicleController@set_total_count_vehicle')->name("set_total_count_vehicle");
Route::put('set_total_count_vehicle_by_id', 'VehicleController@set_total_count_vehicle_by_id_api')->name("set_total_count_vehicle_by_id");
Route::put('set_total_count_starship_by_id', 'StarshipController@set_total_count_starship_by_id_api')->name("set_total_count_starship_by_id");
Route::put('set_total_count_starship', 'StarshipController@set_total_count_starship')->name("set_total_count_starship");
Route::put('add_total_count_starship', 'StarshipController@add_total_count_starship')->name("add_total_count_starship");
Route::put('add_total_count_starship_by_id', 'StarshipController@add_total_count_starship_by_id')->name("add_total_count_starship_by_id");
Route::put('add_total_count_vehicle', 'VehicleController@add_total_count_vehicle')->name("add_total_count_vehicle");
Route::put('add_total_count_vehicle_by_id', 'VehicleController@add_total_count_vehicle_by_id')->name("add_total_count_vehicle_by_id");
Route::put('subtract_total_count_starship', 'StarshipController@subtract_total_count_starship')->name("subtract_total_count_starship");
Route::put('subtract_total_count_starship_by_id', 'StarshipController@subtract_total_count_starship_by_id')->name("subtract_total_count_starship_by_id");
Route::put('subtract_total_count_vehicle', 'VehicleController@subtract_total_count_vehicle')->name("subtract_total_count_vehicle");
Route::put('subtract_total_count_vehicle_by_id', 'VehicleController@subtract_total_count_vehicle_by_id')->name("subtract_total_count_vehicle_by_id");

