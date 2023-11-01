<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\GetDataController;
use App\Http\Controllers\JobController;
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
Route::get('/departments', [DepartmentController::class, 'index'])->name('index_departments');
Route::post('/departments', [DepartmentController::class, 'store'])->name('store_department');
Route::put('/departments/{id}', [DepartmentController::class, 'update'])->name('update_department');
Route::delete('/departments/{id}', [DepartmentController::class, 'destroy'])->name('destroy_department');

// jobs

Route::get('/jobs', [JobController::class, 'index'])->name('index_jobs');
Route::post('/jobs', [JobController::class, 'store'])->name('store_job');
Route::put('/jobs/{id}', [JobController::class, 'update'])->name('update_job');
Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->name('destroy_job');

//get data
Route::get('/getJobs', [GetDataController::class, 'getDataJobs']);
Route::get('/getDepartements', [GetDataController::class, 'getDataDepartements']);

require __DIR__.'/auth.php';
