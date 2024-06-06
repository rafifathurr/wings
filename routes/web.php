<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * Authenticate
 */
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('auth-authenticate');

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::group(['controller' => CheckoutController::class, 'prefix' => 'checkout', 'as' => 'checkout.'], function () {
        Route::get('/', 'index')->name('index');
        Route::post('store', 'store')->name('store');
    });

    Route::group(['controller' => ReportController::class, 'prefix' => 'report', 'as' => 'report.'], function () {
        Route::get('/', 'index')->name('index');
        Route::post('show/{id}', 'show')->name('show');
    });
});
