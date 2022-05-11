<?php

use App\Project;
use App\ProjectStaff;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

Route::get('/dextop_login', function(Request $request){
    // return $request;
    // return json_encode([$request->email, $request->password]);
    return json_encode(User::where('email', $request->email)->get());
});

Route::get('/dextop_projects', 'TestApiController@dextop_projects');

Route::get('/home', function () {
    return view('backend.welcome');
});

Route::get('/', 'Frontend\HomeController@index');

Route::group(
    ['middleware' => ['auth']],
    function () {
        //company module
        Route::get('/company', 'Backend\CompanyController@index')->name('company.index');
        Route::get('/company/create', 'Backend\CompanyController@create')->name('company.create');
        Route::post('/company/store', 'Backend\CompanyController@store')->name('company.store');
        Route::get('/company/{company}', 'Backend\CompanyController@show')->name('company.show');
        Route::put('/company/{company}', 'Backend\CompanyController@update')->name('company.update');
        Route::delete('/company/{company}', 'Backend\CompanyController@destroy')->name('company.destroy');

        //project module
        Route::get('/project/{company}', 'Backend\ProjectController@index')->name('project.index');
        Route::post('/project/store', 'Backend\ProjectController@store')->name('project.store');
        Route::get('/project/show/{project}', 'Backend\ProjectController@show')->name('project.show');
        Route::put('/project/{project}', 'Backend\ProjectController@update')->name('project.update');
        Route::delete('/project/{project}', 'Backend\ProjectController@destroy')->name('project.destroy');
        //project staff assign module
        Route::get('/project/{project}/details', 'Backend\ProjectController@details')->name('project.details');
        Route::post('/project/staff/store', 'Backend\ProjectController@storeStaff')->name('storeStaff');
        Route::delete('/project_staff/{project_staff}', 'Backend\ProjectController@project_staff_destroy')->name('project_staff.destroy');

        //staff module
        Route::get('/staff/{company}', 'Backend\StaffController@index_company')->name('staff.index_company');
        Route::resource('/staff', 'Backend\StaffController');
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
