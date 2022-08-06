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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

*/

Route::get('/dextop_login', 'TestApiController@dextop_login');

Route::get('/dextop_projects', 'TestApiController@dextop_projects');

Route::get('/dextop_time_tracker', 'TestApiController@dextop_time_tracker');

Route::get('/dextop_screenshot_duration', 'TestApiController@dextop_screenshot_duration');

Route::get('/dextop_time_tracker_stop', 'TestApiController@dextop_time_tracker_stop');

Route::post('/dextop_test_upload', 'TestApiController@dextop_test_upload');

Route::post('/dextop_no_ui_upload', 'TestApiController@dextop_no_ui_upload');
