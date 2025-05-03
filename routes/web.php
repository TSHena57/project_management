<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;

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
});
