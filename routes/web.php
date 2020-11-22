<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\RequestController;

use App\Http\Controllers\Technician\TechnicianDashboardController;
use App\Http\Controllers\Technician\FollowedUpRequestController;

use App\Http\Controllers\Manager\ManagerDashboardController;

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

Auth::routes(['register' => false, 'reset' => false]);

// Route::group( ['middleware' => 'auth' ], function()
// {
//     Route::get('admin/index', 'AdminController@index');
//     Route::get('admin/ajuda', 'AdminController@ajuda');
// });

Route::prefix('/')
    ->namespace('User')
    ->middleware(['auth', 'is.user'])
    ->group(function(){
        Route::get('/', [UserDashboardController::class, 'index'])
        ->name('user.dashboard');
        Route::get('/request', [RequestController::class, 'index'])
        ->name('user.request');
        Route::get('/request/json', [RequestController::class, 'json'])
        ->name('user.request.json');
        Route::get('/request/create', [RequestController::class, 'create'])
        ->name('user.request.create');
        Route::post('/request/store', [RequestController::class, 'store'])
        ->name('user.request.store');
        Route::get('/request/print/{id}', [RequestController::class, 'printPreview'])
        ->name('user.request.print');
    });

Route::prefix('t')
    ->namespace('Technician')
    ->middleware(['auth', 'is.technician'])
    ->group(function(){
        Route::get('/', [TechnicianDashboardController::class, 'index'])
        ->name('technician.dashboard');
        Route::get('/f-up-request', [FollowedUpRequestController::class, 'index'])
        ->name('technician.f-up-request');
        Route::get('/f-up-request/json', [FollowedUpRequestController::class, 'json'])
        ->name('technician.f-up-request.json');
        Route::get('/f-up-request/show/{id}', [FollowedUpRequestController::class, 'show'])
        ->name('technician.f-up-request.show');
        Route::get('/f-up-request/edit/{id}', [FollowedUpRequestController::class, 'edit'])
        ->name('technician.f-up-request.edit');
        Route::get('/f-up-request/update/{id}', [FollowedUpRequestController::class, 'update'])
        ->name('technician.f-up-request.update');
    });

Route::prefix('m')
    ->namespace('Manager')
    ->middleware(['auth', 'is.manager'])
    ->group(function(){
        Route::get('/', [ManagerDashboardController::class, 'index'])
        ->name('manager.dashboard');
    });