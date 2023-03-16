<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;

Route::get('/v1/typology/all', [ApiController::class, 'getAllTypologies']);
Route::get('/v1/restaurant/filtered', [ApiController::class, 'getFilteredRestaurants']);
Route::get('/v1/restaurant/{restaurant}', [ApiController::class, 'getDishesAndRestaurants']);

Route::post('/v1/order/store', [ApiController::class, 'orderStore']);