<?php

use App\Http\Controllers\PilotController;
use App\Http\Controllers\HangarController;
use App\Http\Controllers\PesawatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;    


Auth::routes();
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [IndexController::class, 'index'])->name('index');
});



// pilot route
Route::get('pilot-all', [PilotController::class, 'index'])->name('pilot.index');
Route::get('add-pilot', [PilotController::class, 'create'])->name('pilot.create');
Route::post('store-pilot', [PilotController::class, 'store'])->name('pilot.store');
Route::get('edit-pilot/{id}', [PilotController::class, 'edit'])->name('pilot.edit');
Route::post('update-pilot/{id}', [PilotController::class, 'update'])->name('pilot.update');
Route::post('delete-pilot/{id}', [PilotController::class, 'delete'])->name('pilot.delete');
Route::post('softdelete-pilot/{id}', [PilotController::class,  'softDelete'])->name('pilot.softDelete');
Route::get('restore-pilot', [PilotController::class,  'restore'])->name('pilot.restore');

// Routing Pesawat
Route::get('pesawat-all', [PesawatController::class, 'index'])->name('pesawat.index');
Route::get('add-pesawat', [PesawatController::class, 'create'])->name('pesawat.create');
Route::post('store-pesawat', [PesawatController::class, 'store'])->name('pesawat.store');
Route::get('edit-pesawat/{id}', [PesawatController::class, 'edit'])->name('pesawat.edit');
Route::post('update-pesawat/{id}', [PesawatController::class, 'update'])->name('pesawat.update');
Route::post('delete-pesawat/{id}', [PesawatController::class, 'delete'])->name('pesawat.delete');
Route::post('softdelete-pesawat/{id}', [PesawatController::class,  'softDelete'])->name('pesawat.softDelete');
Route::get('restore-pesawat', [PesawatController::class,  'restore'])->name('pesawat.restore');

// Routing Hangar
Route::get('hangar-all', [HangarController::class, 'index'])->name('hangar.index');
Route::get('add-hangar', [HangarController::class, 'create'])->name('hangar.create');
Route::post('store-hangar', [HangarController::class, 'store'])->name('hangar.store');
Route::get('edit-hangar/{id}', [HangarController::class, 'edit'])->name('hangar.edit');
Route::post('update-hangar/{id}', [HangarController::class, 'update'])->name('hangar.update');
Route::post('delete-hangar/{id}', [HangarController::class, 'delete'])->name('hangar.delete');
Route::post('softdelete-hangar/{id}', [HangarController::class,  'softDelete'])->name('hangar.softDelete');
Route::get('restore-hangar', [HangarController::class,  'restore'])->name('hangar.restore');

