<?php

use App\Http\Controllers\DeviceController;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::controller(DeviceController::class)->group(function () {
    Route::post('/device', 'store');
    Route::get('/device/{Device}', 'needsToRefresh');
    Route::get('/device/{Device}/refresh', 'refresh');
    Route::post('/device/{Device}/playlist', 'setPlaylist');
    Route::post('/device/{Device}/phrase', 'setPhrase');
    Route::delete('/device/{Device}/phrase/{Phrase}', 'unsetPhrase');
});
