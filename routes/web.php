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
    return view('welcome');
});
Route::get('home', 'HomeController@index');
Route::get('starships', 'StarshipController@index');
Route::get('starship/{starship_id}/', 'StarshipController@starship_review');
Route::get('vehicles', 'VehicleController@index');
Route::get('vehicle/{vehicle_id}/', 'VehicleController@vehicle_review');
Route::get('my-users', 'StarshipController@myUsers');;
Route::post('set_total_count_vehicle_by_id', array(
      'uses' => 'VehicleController@set_total_count_vehicle_by_id',
      'as' => 'total_count',
      'as' => 'vehicle_id'
))->name("set_total_count_vehicle_by_id");
Route::post('set_total_count_starship_by_id', array(
      'uses' => 'StarshipController@set_total_count_starship_by_id',
      'as' => 'total_count',
      'as' => 'vehicle_id'
))->name("set_total_count_starship_by_id");
Route::get('sincronize_starships','StarshipController@sincronize_starships')->name("sincronize_starships");
Route::get('sincronize_vehicles','VehicleController@sincronize_vehicles')->name("sincronize_vehicles");
Route::get('test','TestController@index')->name("test");
Route::get('show_all_vehicles','VehicleController@show_all_vehicles')->name("show_all_vehicles");
Route::get('show_all_starships','StarshipController@show_all_starships')->name("show_all_starships");
Route::get('show_starship/{name}', 'StarshipController@show_starship')->name("show_starship");
Route::get('show_vehicle/{name}', 'VehicleController@show_vehicle')->name("show_vehicle");
Route::get('get_total_count_starship/{name}', 'StarshipController@get_total_count_starship')->name("get_total_count_starship");
Route::get('get_total_count_vehicle/{name}', 'VehicleController@get_total_count_vehicle')->name("get_total_count_vehicle");
Route::get('set_total_count_vehicle/{name}/{total_count}', 'VehicleController@set_total_count_vehicle')->name("set_total_count_vehicle");
Route::get('set_total_count_starship/{name}/{total_count}', 'StarshipController@set_total_count_starship')->name("set_total_count_starship");
