<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\RequestController;

use App\Http\Controllers\Technician\TechnicianDashboardController;
use App\Http\Controllers\Technician\FollowedUpRequestController;
use App\Http\Controllers\Technician\BreakTypeController;
use App\Http\Controllers\Technician\ComputerController;
use App\Http\Controllers\Technician\DepartmentController;
use App\Http\Controllers\Technician\UserController;

use App\Http\Controllers\Manager\ManagerDashboardController;
use App\Http\Controllers\Manager\VerifiedRequestController;
use App\Http\Controllers\Manager\TechnicianController;

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

Route::prefix('/')
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
    ->middleware(['auth', 'is.technician'])
    ->group(function(){
        Route::get('/', [TechnicianDashboardController::class, 'index'])
        ->name('technician.dashboard');
        Route::get('/json', [TechnicianDashboardController::class, 'json'])
        ->name('technician.dashboard.json');

        Route::get('/f-up-request', [FollowedUpRequestController::class, 'index'])
        ->name('technician.f-up-request');
        Route::get('/f-up-request/json', [FollowedUpRequestController::class, 'json'])
        ->name('technician.f-up-request.json');
        Route::get('/f-up-request/show/{id}', [FollowedUpRequestController::class, 'show'])
        ->name('technician.f-up-request.show');
        Route::get('/f-up-request/edit/{id}', [FollowedUpRequestController::class, 'edit'])
        ->name('technician.f-up-request.edit');
        Route::put('/f-up-request/update/{id}', [FollowedUpRequestController::class, 'update'])
        ->name('technician.f-up-request.update');

        Route::get('/computer/json', [ComputerController::class, 'json'])
        ->name('computer.json');

        Route::get('/user/json', [UserController::class, 'json'])
        ->name('user.json');

        Route::resources([
            'break-type'    => BreakTypeController::class,
            'computer'      => ComputerController::class,
            'department'    => DepartmentController::class,
            'user'          => UserController::class
        ]);
    });

Route::prefix('m')
    ->middleware(['auth', 'is.manager'])
    ->group(function(){
        Route::get('/', [ManagerDashboardController::class, 'index'])
        ->name('manager.dashboard');
        Route::get('/verified-request', [VerifiedRequestController::class, 'index'])
        ->name('manager.verified-request');
        Route::get('/verified-request/json', [VerifiedRequestController::class, 'json'])
        ->name('manager.verified-request.json');
        Route::put('/verified-request/verify/{id}', [VerifiedRequestController::class, 'verify'])
        ->name('manager.verified-request.verify');
        Route::get('/technician/json', [TechnicianController::class, 'json'])
        ->name('technician.json');

        Route::resources([
            'technician'    => TechnicianController::class
        ]);
    });