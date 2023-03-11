<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;

Route::get('/v1/typology/all', [ApiController::class, 'getAllTypologies'])->name('typology.all');
Route::get('/v1/restaurant/filtered', [ApiController::class, 'getFilteredRestaurants'])->name('restaurant.filtered');
Route::get('/v1/dish/all', [ApiController::class, 'getDishes'])->name('dish.all');
