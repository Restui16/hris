<?php

use App\Http\Controllers\DepartementController;
use App\Http\Controllers\GetDataController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard2', function() {
    return view('dashboard2');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// departements
Route::get('/departements', [DepartementController::class, 'index'])->name('index_departements');
Route::post('/departements', [DepartementController::class, 'store'])->name('store_departement');
Route::put('/departements/{id}', [DepartementController::class, 'update'])->name('update_departement');
Route::delete('/departements/{id}', [DepartementController::class, 'destroy'])->name('destroy_departement');


Route::get('/getDepartements', [GetDataController::class, 'getDataDepartements']);

require __DIR__.'/auth.php';
