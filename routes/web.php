<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\RequestController;

use App\Http\Controllers\Technician\TechnicianDashboardController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Auth::routes(['register' => false, 'reset' => false]);

// Route::get('/', [HomeController::class, 'index'])
//     ->name('home')
//     ->middleware(['auth', 'user']);

Route::prefix('user')
    ->namespace('User')
    ->middleware(['auth'])
    ->group(function(){
        Route::get('/', [UserDashboardController::class, 'index'])
        ->name('user.dashboard');
        Route::get('/request', [RequestController::class, 'index'])
        ->name('user.request');
    });

Route::prefix('technician')
    ->namespace('Technician')
    ->middleware(['auth', 'is.technician'])
    ->group(function(){
        Route::get('/', [TechnicianDashboardController::class, 'index'])
        ->name('technician.dashboard');
    });

Route::prefix('manager')
    ->namespace('Manager')
    ->middleware(['auth', 'is.manager'])
    ->group(function(){
        Route::get('/', [ManagerDashboardController::class, 'index'])
        ->name('manager.dashboard');
    });