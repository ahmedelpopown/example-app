<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeavesController;
 use App\Http\Controllers\RegimentController;
use App\Http\Controllers\SoldiersController;
use App\Http\Controllers\SoldiersDataController;

Route::get('/', [HomeController::class, 'index'])->name('home');
 
Route::resource('regiment', RegimentController::class);
// في web.php
 Route::resource('soldiers', SoldiersController::class);

Route::get('/regiments/{id}', [RegimentController::class, 'show'])->name('regiments.show');

Route::resource('soldiers-data', SoldiersDataController::class);
Route::resource('leaves', LeavesController::class);
Route::put('/soldiers/{id}/update-status', [SoldiersController::class, 'updateStatus'])->name('soldiers.updateStatus');

