<?php

use App\Http\Controllers\Api\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth.basic_token')->group(function () {

    Route::post('add-gold', [DashboardController::class, 'addGold']);
    Route::post('remove-gold', [DashboardController::class, 'reduceGold']);
    Route::post('balance_gold', [DashboardController::class, 'solde']);

    Route::post('show_resource_category', [DashboardController::class, 'resourceCategory']);
    Route::post('show_items_category', [DashboardController::class, 'itemsCategory']);

    Route::post('add-user', [DashboardController::class, 'addDiscordUser']);

    Route::post('contribution', [DashboardController::class, 'displayContribution']);
});

