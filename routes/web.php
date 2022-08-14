<?php

use App\User;
use App\Project;
use App\ProjectStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ActiveProjectsController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\EmployeeProjectController;
use App\Http\Controllers\Frontend\ChartsController;

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

Route::get('/test', function () {
    return view('test');
});

Route::get('/mail', function () {
    $to_name = 'Tawhidur Noor';
    $to_email = 'tawhidbadhan@gmail.com';
    $data = array('name' => $to_name, "body" => "Test mail");

    Mail::send('backend.email.mail', $data, function ($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
            ->subject('Timetracker Web Testing Mail');
        $message->from('tawhidbadhan@gmail.com', 'Artisans Web');
    });
});

//Frontend
Route::get('/', 'Frontend\HomeController@index')->name('index');
Route::get('/page/{page_slug}', 'Frontend\HomeController@page')->name('page');
Route::get('/contact', 'Frontend\HomeController@contact')->name('contact.index');
Route::post('/contact/store', 'Frontend\HomeController@stoteContact')->name('contact.store');

//google login
Route::get('/login/google', 'Auth\LoginController@google')->name('login.google');

Route::get('/login/google/redirect', 'Auth\LoginController@googleRedirect');

Route::group(
    ['middleware' => ['auth']],
    function () {
        //Dashboard
        Route::get('/dashboard', 'Backend\DashboardController@index')->name('dashboard');

        //Profile
        Route::get('/profile', 'Backend\ProfileController@index')->name('profile.index');
        Route::get('/profile/edit', 'Backend\ProfileController@edit')->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'patch'])->name('profile.update');

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
        Route::put('/employee/unarchive/{employee}', 'Backend\EmployeeController@unarchive')->name('employee.unarchive');
        Route::get('/employee/archived', 'Backend\EmployeeController@archivedIndex')->name('employee.archived.index');
        Route::resource('/employee', 'Backend\EmployeeController');
        //invitation for non user
        Route::post('/employee/mailinvitations', 'Backend\EmployeeController@mailInvitations')->name('employee.mailinvitations');

        //project module
        Route::get('/project', 'Backend\ProjectController@index')->name('project.index');
        Route::post('/project/store', 'Backend\ProjectController@store')->name('project.store');
        Route::get('/project/details/{id}', 'Backend\ProjectController@details')->name('project.details');
        Route::put('/project/people/remove', 'Backend\ProjectController@removeProjectPeople')->name('project.people.remove');
        Route::put('/project/people/reassign', 'Backend\ProjectController@reassignProjectPeople')->name('project.people.reassign');
        Route::post('/project/searchpeople/{id}', 'Backend\ProjectController@searchPeople')->name('project.search.people');
        Route::post('/project/addpeople/{id}', 'Backend\ProjectController@addPeople')->name('project.add.people');

        //report module
        Route::get('/report', 'Backend\ReportController@index')->name('report.index');

        Route::prefix('active-projects')->group(function () {
            Route::get('/', [ActiveProjectsController::class, 'index'])->name('active.project.index');
        });

        Route::prefix('charts')->group(function () {
            Route::get('/project-heatmap', [ChartsController::class, 'projectBasedHeatmap'])->name('chart.project.heatmap');
            Route::get('/employee-heatmap', [ChartsController::class, 'employeeBasedHeatmap'])->name('chart.employee.heatmap');
        });

        //folowing are old, I am working on it
        Route::put('/project/{project}', 'Backend\ProjectController@update')->name('project.update');
        Route::delete('/project/{project}', 'Backend\ProjectController@destroy')->name('project.destroy');


        //timetracker(project->staff->details)
        Route::get('/project/{project}/timetracker/{employee}', 'Backend\ProjectController@timeTracker')->name('project.timeTracker');
        Route::get('/screenshot/{timetracker}', 'Backend\ProjectController@screenShot')->name('project.screenShot');



        //employee module
        Route::get('/employee_dashboard', 'Backend\DashboardController@employeeIndex')->name('employee.dashboard');

        //projects
        Route::get('/employee_project', 'Backend\EmployeeProjectController@Index')->name('employee.project');

        //project wise time tracker
        Route::get('/employeee_tt/{project}', 'Backend\EmployeeProjectController@timeTracker')->name('employee_module.timetracker');

        //invitations
        Route::get('/invitations', 'Backend\EmployeeInvitaionController@index')->name('employee.view.invitations');
        Route::post('/invitations/accept', 'Backend\EmployeeInvitaionController@acceptInvitation')->name('employee.accept.invitations');
        Route::post('/invitations/reject', 'Backend\EmployeeInvitaionController@rejectInvitation')->name('employee.reject.invitations');

        //employers
        Route::get('/employers',  'Backend\EmployeeEmployerController@index')->name('employee.employers.index');

        //login mode switcher
        Route::get('/mode_switcher', 'Backend\DashboardController@modeSwitcher')->name('employee.mode_switcher');

        //seetings
        Route::resource('/settings', 'Backend\SettingsController');

        //downloads
        Route::get('/downloads', 'Backend\DownloadController@index')->name('downloads.index');

        //pricing
        Route::get('pricing/employer', 'Backend\PricingController@index')->name('pricing.employer.index');
        Route::post('pricing/employer', 'Backend\PricingController@store')->name('pricing.employer.store');
        Route::get('pricing/{tier}', 'Backend\PricingController@fetchPricingTier')->name('pricing.employer.price.tier');

        //employee subscription
        Route::prefix('subscription')->group(function () {
            Route::get('/', 'Backend\SubscriptionController@index')->name('subscription.index');
            Route::delete('/', 'Backend\SubscriptionController@destroy')->name('subscription.destroy');
        });
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


// SSLCOMMERZ Start
Route::get('/example1', 'SslCommerzPaymentController@exampleEasyCheckout');
Route::get('/example2', 'SslCommerzPaymentController@exampleHostedCheckout');

Route::post('/pay', 'SslCommerzPaymentController@index');
Route::post('/pay-via-ajax', 'SslCommerzPaymentController@payViaAjax');

Route::post('/success', 'SslCommerzPaymentController@success');
Route::post('/fail', 'SslCommerzPaymentController@fail');
Route::post('/cancel', 'SslCommerzPaymentController@cancel');

Route::post('/ipn', 'SslCommerzPaymentController@ipn');
//SSLCOMMERZ END