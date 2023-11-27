<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\BrandController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('brand')->group(function(){
    Route::get("index", [BrandController::class,"index"]);
    Route::get("show/{id}", [BrandController::class,"show"]);
    Route::post("store", [BrandController::class,"store"]);
    Route::put("update/{id}", [BrandController::class,"update"]);
    Route::delete("destroy/{id}", [BrandController::class,"delete"]);
});
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
