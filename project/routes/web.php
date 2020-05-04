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



Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'CompaniesController@index')->name('companies.index');


    Route::get('/companies', 'CompaniesController@index')->name('companies.index');
    Route::get('/companies/create', 'CompaniesController@create');
    Route::post('/companies/create','CompaniesController@store')->name('companies.store');
    Route::get('/companies/edit/{id}', 'CompaniesController@edit')->name('companies.edit');
    Route::post('/companies/update', 'CompaniesController@update')->name('companies.update');
    Route::get('/companies/delete/{id}', 'CompaniesController@destroy')->name('companies.destroy');


    Route::get('/certificates', 'CertificatesController@index')->name('certificates.index');
    Route::get('/certificates/create', 'CertificatesController@create');
    Route::post('/certificates/create','CertificatesController@store')->name('certificates.store');
    Route::get('/certificates/edit/{id}', 'CertificatesController@edit')->name('certificates.edit');
    Route::post('/certificates/update', 'CertificatesController@update')->name('certificates.update');
    Route::get('/certificates/delete/{id}', 'CertificatesController@destroy')->name('certificates.destroy');

    Route::get('/home', 'CompaniesController@index')->name('companies.index');

});


