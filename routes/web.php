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

Route::get('/', [MainController::class, 'home'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route private    
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route delete dish:
    Route :: get('/dish/delete/{dish}', [MainController :: class, 'dishDelete'])
    -> name('dish.delete');

    // Route edit dish(per form):
    Route :: get('/dish/edit/{dish}', [MainController :: class, 'dishEdit']) 
    -> name('dishEdit');

    // Route create dish(per form):
    Route :: get('/dish/create', [MainController :: class, 'dishCreate']) 
    -> name('dishCreate');

    // Route create dish(per ricevere dati da form):
    Route :: post('/dish/store', [MainController :: class, 'dishStore']) 
    -> name('dishStore');

    // Route home orders:
    Route :: get('/order', [MainController :: class, 'orderHome'])
    -> name('order.home');

    // Route show order:
    Route :: get('/order/show/{order}', [MainController :: class, 'orderShow'])
    -> name('order.show');

    // Route show dish
    Route :: get('/dish/show/{dish}', [MainController :: class, 'dishShow'])
    -> name('dish.show');

    // Route update (per ricevere dati da form):
    Route :: post('/dish/update/{dish}', [MainController :: class, 'dishUpdate']) 
    -> name('dishUpdate');
    
    // Route restaurant
    Route::get('/restaurant', [MainController::class, 'restaurant'])->name('restaurant');
    
});

require __DIR__.'/auth.php';
