<?php

/*
|--------------------------------------------------------------------------
| gpibarra\LaravelAdminLTE Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are
| handled by the gpibarra\LaravelAdminLTE package.
|
*/

Route::aliasMiddleware('admin', \gpibarra\LaravelAdminLTE\app\Http\Middleware\Admin::class);

Route::group(
[
    'namespace'  => 'gpibarra\LaravelAdminLTE\app\Http\Controllers',
    'middleware' => 'web',
    'prefix'     => config('laraveladminlte.route_prefix'),
],
function () {
    Route::get(config('laraveladminlte.route_dashboard'), 'AdminController@dashboard')->name('LaravelAdminLTE.dashboard');
    Route::get('/', 'AdminController@redirect')->name('laraveladminlte');

    Route::get('account/edit-account-info', 'Auth\MyAccountController@getAccountInfoForm')->name('LaravelAdminLTE.account.info');
    Route::post('account/edit-account-info', 'Auth\MyAccountController@postAccountInfoForm');
    Route::get('account/change-password', 'Auth\MyAccountController@getChangePasswordForm')->name('LaravelAdminLTE.account.password');
    Route::post('account/change-password', 'Auth\MyAccountController@postChangePasswordForm');
});
