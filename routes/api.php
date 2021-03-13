<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContinentController;
use App\Http\Controllers\CountryController;

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

Route::group([
    'prefix' => 'continent'

], function ($router) {
    Route::get('/', [ContinentController::class, 'index']);
    Route::get('/{continent}', [ContinentController::class, 'show']);
    Route::post('/', [ContinentController::class, 'store']);
    Route::put('/{continent}', [ContinentController::class, 'update']);
    Route::delete('/{continent}', [ContinentController::class, 'destroy']);

    
    Route::get('/{continent}/country', [CountryController::class, 'index']);
    Route::get('/{continent}/country/{country}', [CountryController::class, 'show']);
    Route::post('/{continent}/country', [CountryController::class, 'store']);
    Route::put('/{continent}/country/{country}', [CountryController::class, 'update']);
    Route::delete('/{continent}/country/{country}', [CountryController::class, 'destroy']);
});

