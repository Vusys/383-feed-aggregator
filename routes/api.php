<?php

use App\Http\Controllers\FeedController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/v1/places/top-places/{feedAggregate}', [FeedController::class, 'aggregate'])->name('api.places.top_places.aggregate');
Route::get('/v1/aggregates', [FeedController::class, 'listAggregates'])->name('api.aggregates');