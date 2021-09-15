<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


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


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/reduce', [DashboardController::class, 'remove'])->name('dashboard.remove');
    Route::post('/add', [DashboardController::class, 'add'])->name('dashboard.add');
    Route::post('/add-gold', [DashboardController::class, 'addGold'])->name('dashboard.add.gold');
    Route::post('/reduce-gold', [DashboardController::class, 'reduceGold'])->name('dashboard.reduce.gold');
});
