<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/companies', 'CompaniesController@index')->name('companies.index');
Route::get('/companies/create', 'CompaniesController@create');
Route::post('/companies/create','CompaniesController@store')->name('companies.store');
Route::get('/companies/edit/{id}', 'CompaniesController@edit')->name('companies.edit');
Route::post('/companies/update', 'CompaniesController@update')->name('companies.update');
Route::get('/companies/delete/{id}', 'CompaniesController@destroy')->name('companies.destroy');
