<?php

use App\Project;
use App\ProjectStaff;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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

Route::get('/test', function(){
    return view('test');
});

Route::get('/dextop_login', 'TestApiController@dextop_login');

Route::get('/dextop_projects', 'TestApiController@dextop_projects');

Route::get('/dextop_time_tracker', 'TestApiController@dextop_time_tracker');

Route::get('/dextop_screenshot_duration', 'TestApiController@dextop_screenshot_duration');

Route::get('/dextop_time_tracker_stop', 'TestApiController@dextop_time_tracker_stop');

Route::post('/dextop_test_upload', 'TestApiController@dextop_test_upload');

Route::post('/dextop_no_ui_upload', 'TestApiController@dextop_no_ui_upload');

Route::get('/mail', function(){
    $to_name = 'Tawhidur Noor';
    $to_email = 'tawhidbadhan@gmail.com';
    $data = array('name' => $to_name, "body" => "Test mail");

    Mail::send('backend.email.mail', $data, function ($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
            ->subject('Timetracker Web Testing Mail');
        $message->from('tawhidbadhan@gmail.com', 'Artisans Web');
    });
});

Route::get('/', 'Frontend\HomeController@index');

Route::group(
    ['middleware' => ['auth']],
    function () {
        //Dashboard
        Route::get('/dashboard', 'Backend\DashboardController@index')->name('dashboard');

        //Profile
        Route::get('/profile', 'Backend\ProfileController@index')->name('profile.index');
        Route::get('/profile/edit', 'Backend\ProfileController@edit')->name('profile.edit');

        //Employee
        Route::post('/employee/search', 'Backend\EmployeeController@search')->name('employee.search');
        Route::post('/employee/invitation', 'Backend\EmployeeController@storeInvitation')->name('employee.store_invitation');
        Route::get('/employee/invitations', 'Backend\EmployeeController@invitations')->name('employee.invitations');
        Route::delete('/employee/invitations', 'Backend\EmployeeController@destroyInvitation')->name('employee.invitation.destroy');
        Route::get('/employee/timetracker/{employee}', 'Backend\EmployeeController@timeTracker')->name('employee.timetracker');
        Route::get('/employee/timetracker/noui/{employee}', 'Backend\EmployeeController@timeTrackerNoUI')->name('employee.timetracker.noui');
        Route::get('/employee/mac/add', 'Backend\EmployeeController@addMacEmp')->name('employee.add.mac');
        Route::get('/employee/report/{employee}', 'Backend\EmployeeController@report')->name('employee.report');
        Route::put('/employee/archive/{employee}', 'Backend\EmployeeController@archive')->name('employee.archive');
        Route::resource('/employee', 'Backend\EmployeeController');
        //invitation for non user
        Route::post('/employee/mailinvitations', 'Backend\EmployeeController@mailInvitations')->name('employee.mailinvitations');

        //project module
        Route::get('/project', 'Backend\ProjectController@index')->name('project.index');
        Route::post('/project/store', 'Backend\ProjectController@store')->name('project.store');
        Route::get('/project/details/{id}', 'Backend\ProjectController@details')->name('project.details');
        Route::delete('/project/people/destroy', 'Backend\ProjectController@destroyProjectPeople')->name('project.people.destroy');
        Route::post('/project/searchpeople/{id}', 'Backend\ProjectController@searchPeople')->name('project.search.people');
        Route::post('/project/addpeople/{id}', 'Backend\ProjectController@addPeople')->name('project.add.people');

        //folowing are old, I am working on it
        Route::put('/project/{project}', 'Backend\ProjectController@update')->name('project.update');
        Route::delete('/project/{project}', 'Backend\ProjectController@destroy')->name('project.destroy');


        //timetracker(project->staff->details)
        Route::get('/project/{project}/timetracker/{employee}', 'Backend\ProjectController@timeTracker')->name('project.timeTracker');
        Route::get('/screenshot/{timetracker}', 'Backend\ProjectController@screenShot')->name('project.screenShot');



        //employee module
        Route::get('/employee_dashboard', 'Backend\DashboardController@employeeIndex')->name('employee.dashboard');
        //invitations
        Route::get('/invitations', 'Backend\EmployeeInvitaionController@index')->name('employee.view.invitations');
        Route::post('/invitations/accept', 'Backend\EmployeeInvitaionController@acceptInvitation')->name('employee.accept.invitations');
        Route::post('/invitations/reject', 'Backend\EmployeeInvitaionController@rejectInvitation')->name('employee.reject.invitations');

        //employers
        Route::get('/employers',  'Backend\EmployeeEmployerController@index' )->name('employee.employers.index');

        //login mode switcher
        Route::get('/mode_switcher', 'Backend\DashboardController@modeSwitcher')->name('employee.mode_switcher');

        //seetings
        Route::resource('/settings', 'Backend\SettingsController');

    }
);

Route::group(
    ['middleware' => ['auth']],
    function () {
        Route::resource('/roles', 'RolesController');
        Route::resource('/users', 'UserController');
    }
);

Auth::routes([
    'verify' => true,
]);

Route::get('/home', 'HomeController@index')->name('home');
