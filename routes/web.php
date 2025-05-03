<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectTypeController;
use App\Http\Controllers\ProjectPhaseController;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'welcome')->name('welcome');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin','middleware' => ['auth']], function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
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
    Route::controller(DesignationController::class)->prefix('human-resource/designation/')->group(function () {
        Route::get('list', 'index')->name('designation.index');
        Route::post('store', 'store')->name('designation.store');
        Route::get('edit/{id}', 'edit')->name('designation.edit');
        Route::post('update/{id}', 'update')->name('designation.update');
        Route::post('delete', 'destroy')->name('designation.delete');
    });
    Route::controller(DepartmentController::class)->prefix('human-resource/department/')->group(function () {
        Route::get('list', 'index')->name('department.index');
        Route::post('store', 'store')->name('department.store');
        Route::get('edit/{id}', 'edit')->name('department.edit');
        Route::post('update/{id}', 'update')->name('department.update');
        Route::post('delete', 'destroy')->name('department.delete');
    });
    Route::controller(EmployeeController::class)->prefix('human-resource/employee/')->group(function () {
        Route::get('list', 'index')->name('employee.index');
        Route::get('create', 'create')->name('employee.create');
        Route::post('store', 'store')->name('employee.store');
        Route::get('edit/{id}', 'edit')->name('employee.edit');
        Route::get('show/{id}', 'show')->name('employee.show');
        Route::post('update/{id}', 'update')->name('employee.update');
        Route::post('delete', 'destroy')->name('employee.delete');
    });
    Route::controller(ProjectTypeController::class)->prefix('projects/type/')->group(function () {
        Route::get('list', 'index')->name('type.index');
        Route::post('store', 'store')->name('type.store');
        Route::get('edit/{id}', 'edit')->name('type.edit');
        Route::post('update/{id}', 'update')->name('type.update');
        Route::post('delete', 'destroy')->name('type.delete');
    });
    Route::controller(ProjectPhaseController::class)->prefix('projects/phase/')->group(function () {
        Route::get('list', 'index')->name('phase.index');
        Route::post('store', 'store')->name('phase.store');
        Route::get('edit/{id}', 'edit')->name('phase.edit');
        Route::post('update/{id}', 'update')->name('phase.update');
        Route::post('delete', 'destroy')->name('phase.delete');
    });
});
