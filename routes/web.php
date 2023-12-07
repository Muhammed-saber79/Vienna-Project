<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [ClientController::class, 'index'])->name('home');
Route::post('/register', [ClientController::class, 'register'])->name('client.register');
Route::post('/getUserLocation', [ClientController::class, 'getUserLocation'])->name('client.getUserLocation');

Route::group([
    'middleware' => ['auth', 'verified'],
    // 'prefix' => 'dashboard',
    'as' => 'dashboard.'
], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('index');
    Route::post('/getUserLocation/{client}', [AdminController::class, 'getUserLocation'])->name('getUserLocation');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
