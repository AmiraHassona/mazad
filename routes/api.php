<?php

use App\Http\Controllers\Api\GeneralRequestController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//GeneralRequest
Route::get('categories',[GeneralRequestController::class,'categories']);
Route::get('brands',[GeneralRequestController::class,'brands']);
Route::get('search-category/{name}',[GeneralRequestController::class,'searchCategory']);
Route::get('search-brand/{name}',[GeneralRequestController::class,'searchBrand']);

