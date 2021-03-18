<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
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

Route::apiResource('/authors', AuthorController::class);//->middleware('auth:sanctum');
Route::apiResource('/books', BookController::class);//->middleware('auth:sanctum');
Route::apiResource('/categories', CategoryController::class);//->middleware('auth:sanctum');
Route::get('/authors/{id}/books', [AuthorController::class,'index']);
