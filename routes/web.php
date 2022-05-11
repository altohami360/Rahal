<?php

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DailyTripController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;

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
Route::middleware('auth')->group(function() {
        
    Route::redirect('/', 'dashboard');

    Route::view('/index', 'index');

    //Dashboard
    Route::get('/dashboard', DashboardController::class)->middleware(['auth'])->name('dashboard');

    Route::get('lang/{lang}', [LanguageController::class,'switchLang'])->name('lang.switch');


    //Role routes
    Route::get('/roles/data', [RoleController::class, 'data'])->name('roles.data');
    Route::delete('/roles/bulk_delete', [RoleController::class ,'bulkDelete'])->name('roles.bulk_delete');
    Route::resource('roles', RoleController::class);

    //User routes
    Route::get('/users/data', [UserController::class, 'data'])->name('users.data');
    Route::delete('/users/bulk_delete', [UserController::class, 'bulkDelete'])->name('users.bulk_delete');
    Route::resource('users', UserController::class);

    //Driver routes
    Route::get('/drivers/data', [DriverController::class, 'data'])->name('drivers.data');
    Route::delete('/drivers/bulk_delete', [DriverController::class, 'bulkDelete'])->name('drivers.bulk_delete');
    Route::resource('drivers', DriverController::class);

    //Customer routes
    Route::get('/customers/data', [CustomerController::class, 'data'])->name('customers.data');
    Route::resource('customers', CustomerController::class);

    //Trips routes
    Route::get('/trips/data', [TripController::class, 'data'])->name('trips.data');
    Route::delete('/trips/bulk_delete', [TripController::class, 'bulkDelete'])->name('trips.bulk_delete');
    Route::resource('trips', TripController::class);

    //Daily trips routes
    Route::get('/daily-trips/data', [DailyTripController::class, 'data'])->name('daily-trips.data');
    Route::delete('/daily-trips/bulk_delete', [DailyTripController::class, 'bulkDelete'])->name('daily-trips.bulk_delete');
    Route::resource('daily-trips', DailyTripController::class);

    //Service routes
    Route::get('/services/data', [ServiceController::class, 'data'])->name('services.data');
    Route::delete('/services/bulk_delete', [ServiceController::class, 'bulkDelete'])->name('services.bulk_delete');
    Route::resource('services', ServiceController::class);

    //Reviews routes
    Route::get('/reviews/data', [ReviewController::class, 'data'])->name('reviews.data');
    Route::resource('reviews', ReviewController::class)->only(['index', 'show']);

    //Balances routes
    Route::get('/balances/data', [BalanceController::class, 'data'])->name('balances.data');
    Route::post('/balances/recharge', [BalanceController::class, 'recharge'])->name('balances.recharge');
    Route::resource('balances', BalanceController::class);

    //Profile routes
    Route::put('profile/update', [ProfileController::class, 'update'])->name('user.profile.update');
    Route::get('profile', [ProfileController::class, 'profile'])->name('user.profile');

    //Sitting routes
    Route::get('/settings', SettingController::class)->name('setting');


});

require __DIR__.'/auth.php';

