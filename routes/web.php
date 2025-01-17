<?php

use App\Http\Controllers\NCPController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\AreaController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    ////////////////////////////////////////////-- UserController --//////////////////////////////////////////////////
    Route::resource('UsersManage', UserController::class);

    ////////////////////////////////////////////-- PartController --//////////////////////////////////////////////////
    Route::resource('Part', PartController::class);
    Route::post('/part/update-order', [PartController::class, 'updateOrderPart'])->name('part.updateOrder');

    ////////////////////////////////////////////-- PartController --//////////////////////////////////////////////////
    Route::resource('Areas', AreaController::class);
    // Route::get('Areas/{id}', [AreaController::class, 'index'])->name('Areas.index');


    Route::resource('NCP', NCPController::class);
});

require __DIR__ . '/auth.php';
