<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SquadController;
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


    Route::prefix('/banque')->group(function (){
        Route::get('/', [BankController::class, 'index'])->name('bank');
        Route::post('/reduce', [BankController::class, 'remove'])->name('bank.remove');
        Route::post('/add', [BankController::class, 'add'])->name('bank.add');
        Route::post('/add-gold', [BankController::class, 'addGold'])->name('bank.add.gold');
        Route::post('/reduce-gold', [BankController::class, 'reduceGold'])->name('bank.reduce.gold');
        Route::get('/yolo', [BankController::class, 'yolo'])->name('bank.yolo');
    });

    Route::prefix('contribution')->group(function () {
        Route::get('/', [ContributionController::class, 'index'])->name('contribution');

        Route::post('/create-contribution-gold', [ContributionController::class, 'create_contribution_gold'])->name('add.contribution.gold');
        Route::post('/create-contribution-item', [ContributionController::class, 'create_contribution_item'])->name('add.contribution.item');
    });

    Route::prefix('escouade')->group(function () {
        Route::post('/reload-user', [SquadController::class, 'reloadUser'])->name('squad.reload.user');

        Route::get('/', [SquadController::class, 'index'])->name('squad');

        Route::post('/first-weapon', [SquadController::class, 'selectFirstWeapon'])->name('squad.first.weapon');
        Route::post('/second-weapon', [SquadController::class, 'selectSecondWeapon'])->name('squad.second.weapon');

        Route::post('/classe', [SquadController::class, 'selectClasse'])->name('squad.classe.user');

        Route::post('/job_harvest', [SquadController::class, 'selectJobHarvest'])->name('squad.job.harvest');
        Route::post('/job_transformation', [SquadController::class, 'selectJobTransformation'])->name('squad.job.transformation');

        Route::post('/start_hour', [SquadController::class, 'selectStartHour'])->name('squad.start.hour');
        Route::post('/end_hour', [SquadController::class, 'selectEndHour'])->name('squad.end.hour');
    });
});
