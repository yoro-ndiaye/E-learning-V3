<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\DomaineController;
use App\Http\Controllers\ProfileController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//cours
Route::group(['middleware' => 'auth'], function () {
    // Définissez ici vos routes qui nécessitent une authentification
    Route::get('/cours', [CourController::class, 'index'])->name('cours.index');
    Route::get('/cours/create', [CourController::class, 'create'])->name('cours.create');
    Route::post('/cours', [CourController::class, 'store'])->name('cours.store');
    // ... d'autres routes
});

//domaines
Route::group(['middleware' => 'auth'], function () {
    // Définissez ici vos routes qui nécessitent une authentification
    Route::get('/domaines', [DomaineController::class, 'index'])->name('domaines.index');
    Route::get('/domaines/create', [DomaineController::class, 'create'])->name('domaines.create');
    Route::post('/domaines', [DomaineController::class, 'store'])->name('domaines.store');
    Route::get('/domaines/{id}',[DomaineController::class,'addmodule'])->name('domaines.addmodule');
    Route::get('/domaines/update/{id}',[DomaineController::class,'update'])->name('domaines.update');
    Route::post('/domaines/edit',[DomaineController::class,'edit'])->name('domaines.edit');
    Route::get('/domaines/delete/{id}',[DomaineController::class,'delete'])->name('domaines.delete');
    // ... d'autres routes
});
//modules
Route::group(['middleware' => 'auth'], function () {
    // Définissez ici vos routes qui nécessitent une authentification
    Route::get('/modules', [ModuleController::class, 'index'])->name('module.index');
    Route::get('/modules/create', [ModuleController::class, 'create'])->name('module.create');
    Route::post('/modules', [ModuleController::class, 'store'])->name('module.store');
    Route::get('/modules/{id}',[ModuleController::class,'addcours'])->name('module.addcours');
    Route::get('/modules/update/{id}',[ModuleController::class,'update'])->name('module.update');
    Route::post('/modules/edit',[ModuleController::class,'edit'])->name('module.edit');
    Route::get('/modules/delete/{id}',[ModuleController::class,'delete'])->name('module.delete');
    // ... d'autres routes
});

require __DIR__.'/auth.php';
