<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipperController;
use App\Http\Controllers\ContactController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.')->group(function(){
    Route::group(['prefix' => 'contacts'], function(){
        Route::get('/', [ContactController::class, 'index'])->name('contact.index');
    });
    
    Route::group(['prefix' => 'shippers'], function(){
        Route::get('/index', [ShipperController::class, 'index'])->name('shipper.index');
        Route::post('/create', [ShipperController::class, 'store'])->name('shipper.store');
        Route::get('/{uuid}/show', [ShipperController::class, 'show'])->name('shipper.show');
        Route::patch('/{uuid}/update', [ShipperController::class, 'update'])->name('shipper.update');
    });
})->middleware('cors');

Route::fallback(function(){
    return response()->json([
        'data' => [],
        'message' => 'Endpoint Not Found. If this error persists, make sure you insert the appropriate endpoint or talk to the dev team.',
        'status' => 'false'
    ], 
    404);
});