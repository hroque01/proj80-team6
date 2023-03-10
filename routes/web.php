<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\MainController;

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

// Route home
Route::get('/', [MainController::class, 'home'])->name('home');

// Route restaurant
Route::get('/restaurant', [MainController::class, 'restaurant'])->name('restaurant');

// Route create (per form):
Route :: get('/dish/create', [MainController :: class, 'dishCreate']) 
-> name('dishCreate');

// Route create (per ricevere dati da form):
Route :: post('/dish/store', [MainController :: class, 'dishStore']) 
-> name('dishStore');

// Route delete:
Route :: get('/dish/delete/{dish}', [MainController :: class, 'dishDelete'])
    -> name('dish.delete');

// Route edit (per form):
Route :: get('/dish/edit/{dish}', [MainController :: class, 'dishEdit']) 
    -> name('dishEdit');

//Route private    
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route update (per ricevere dati da form):
    Route :: post('/dish/update/{dish}', [MainController :: class, 'dishUpdate']) 
    -> name('dishUpdate');
    
});

require __DIR__.'/auth.php';
