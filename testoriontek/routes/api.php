<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ClientController;
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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/


Route::get('clients', [ClientController::class, 'index']);
Route::get('directions/{id}', [ClientController::class, 'directions']);

Route::group(['prefix' => 'client'], function () {
    Route::post('add', [ClientController::class, 'add']);
    Route::get('edit/{id}', [ClientController::class, 'edit']);
    Route::post('update/{id}', [ClientController::class, 'update']);
    Route::delete('delete/{id}', [ClientController::class, 'delete']);
    Route::delete('deletedirection/{id}', [ClientController::class, 'deletedirection']);
    Route::get('editdirection/{id}', [ClientController::class, 'editdirection']);
    Route::post('updatedirection/{id}', [ClientController::class, 'updatedirection']);
});


