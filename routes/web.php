<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('www', function () {
    return view('layouts.admin');
});

//Auth::routes(['verify'=> true]);
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');//->middleware('verified');

Route::group(['prefix'=>'companies'],function (){

    Route::get('/','CompaniesController@index')->name('admin.index');
    Route::get('creat','CompaniesController@create')->name('admin.create');
    Route::post('store','CompaniesController@store')->name('admin.store');
    Route::get('getuser/{id}','CompaniesController@getuser')->name('admin.getuser');
    Route::get('edit/{id}','CompaniesController@edit')->name('admin.edit');
    Route::post('update/{id}','CompaniesController@update')->name('admin.update');
});
