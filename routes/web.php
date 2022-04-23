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

Route::get('/home', function () {
    return view('backend.welcome');
});

Route::get('/', 'Frontend\HomeController@index');

Route::group(
    ['middleware' => ['auth']],
    function () {
        //company module
        Route::get('/company/home', 'Frontend\CompanyController@index')->name('company.index');
        Route::get('/company/create', 'Frontend\CompanyController@create');
        Route::post('/company/store', 'Frontend\CompanyController@store')->name('company.store');
    }
);

Route::group(
    ['middleware' => ['auth']],
    function () {
        Route::resource('/roles', 'RolesController');
        Route::resource('/users', 'UserController');
    }
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
