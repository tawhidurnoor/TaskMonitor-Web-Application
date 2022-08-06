<?php

use Illuminate\Support\Facades\Route;


Route::group(
    ['prefix' => 'admin', 'middleware' => ['auth']],
    function () {
        //Dashboard
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

        //Users
        Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
        Route::get('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'details'])->name('users.details');
        Route::get('/users/{user}/compose_mail', [App\Http\Controllers\Admin\UserController::class, 'composeMail'])->name('users.compose.mail');
        Route::post('/users/{user}/send_mail', [App\Http\Controllers\Admin\UserController::class, 'sendMail'])->name('users.send.mail');
        Route::get('/users/{user}/employee', [App\Http\Controllers\Admin\UserController::class, 'employeeList'])->name('employee.list');

        //FAQ
        Route::resource('/faq', '\App\Http\Controllers\Admin\FaqController');
        Route::delete('/faq/delete/{faq}', [App\Http\Controllers\Admin\FaqController::class, 'destroy']);
        //Meta
        Route::resource('/metainfo', '\App\Http\Controllers\Admin\MetaController');

        //logo
        Route::get('/logos', [App\Http\Controllers\Admin\LogoController::class, 'index'])->name('logos.index');
        Route::post('/logos/update', [App\Http\Controllers\Admin\LogoController::class, 'update'])->name('logos.update');

        //inquiries
        Route::get('/inquiries', [App\Http\Controllers\Admin\InquiryController::class, 'index'])->name('inquiries.index');
        Route::get('/inquiries/{inquiry}/compose_mail', [App\Http\Controllers\Admin\InquiryController::class, 'composeMail'])->name('inquiries.compose.mail');
        Route::post('/inquiries/{inquiry}/compose_mail', [App\Http\Controllers\Admin\InquiryController::class, 'sendMail'])->name('inquiries.send.mail');
        Route::delete('/inquiry/delete/{inquiry}', [App\Http\Controllers\Admin\InquiryController::class, 'destroy']);

        //Profile
        Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile.index');
        Route::get('/profile/edit', [App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'patch'])->name('profile.update');

        Route::prefix('subscription')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\SubscriptionController::class, 'index'])->name('subscription.index');
            Route::post('/', [App\Http\Controllers\Admin\SubscriptionController::class, 'store'])->name('subscription.store');
            Route::delete('/{subscription}', [App\Http\Controllers\Admin\SubscriptionController::class, 'destroy'])->name('subscription.destroy');
        });

        Route::prefix('price-tier')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\PriceTierController::class, 'index'])->name('price.tier.index');
            Route::post('/', [App\Http\Controllers\Admin\PriceTierController::class, 'store'])->name('price.tier.store');
        });
    }
);
