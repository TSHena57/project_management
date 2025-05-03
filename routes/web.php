<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DepartmentController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin','middleware' => ['auth']], function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile-settings', 'profile_setup')->name('profile-settings');
        Route::post('/profile-update', 'profile_update')->name('profile_update');
        Route::post('/password-update', 'password_update')->name('password_update');
    });
    Route::controller(ClientController::class)->prefix('leads/')->group(function () {
        Route::get('active-clients', 'active_client')->name('lead.active_client');
        Route::get('inactive-clients', 'inactive_client')->name('lead.inactive_client');
        Route::get('create', 'create')->name('lead.client_create');
        Route::post('store', 'store')->name('lead.client_store');
        Route::get('edit/{id}', 'edit')->name('lead.edit');
        Route::get('show/{id}', 'show')->name('lead.show');
        Route::post('update/{id}', 'update')->name('lead.update');
        Route::post('delete', 'destroy')->name('lead.delete');
    });
    Route::controller(DesignationController::class)->prefix('Human-resource/designation/')->group(function () {
        Route::get('list', 'index')->name('designation.index');
        Route::post('store', 'store')->name('designation.store');
        Route::get('edit/{id}', 'edit')->name('designation.edit');
        Route::post('update/{id}', 'update')->name('designation.update');
        Route::post('delete', 'destroy')->name('designation.delete');
    });
    Route::controller(DepartmentController::class)->prefix('Human-resource/department/')->group(function () {
        Route::get('list', 'index')->name('department.index');
        Route::post('store', 'store')->name('department.store');
        Route::get('edit/{id}', 'edit')->name('department.edit');
        Route::post('update/{id}', 'update')->name('department.update');
        Route::post('delete', 'destroy')->name('department.delete');
    });
});
