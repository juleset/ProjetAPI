<?php

use App\Http\Controllers\AuthorBookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryBookController;
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

//Route::apiResource('/authors', AuthorController::class);//->middleware('auth:sanctum');
//Route::apiResource('/books', BookController::class);//->middleware('auth:sanctum');
//Route::apiResource('/categories', CategoryController::class);//->middleware('auth:sanctum');

//************RESOURCE AUTHOR*************//
Route::resource('/authors', AuthorController::class)->only([
    'index', 'show'
]);
Route::resource('/authors', AuthorController::class)->only([
    'store', 'update'
])->middleware('role');
Route::resource('/authors', AuthorController::class)->only([
    'destroy'
])->middleware('role');

//************RESOURCE CATEGORY*************//
Route::resource('/categories', CategoryController::class)->only([
    'index', 'show'
]);
Route::resource('/categories', CategoryController::class)->only([
    'store', 'update'
])->middleware('role');
Route::resource('/categories', CategoryController::class)->only([
    'destroy'
])->middleware('role');

//************RESOURCE BOOK*************//
Route::resource('/books', BookController::class)->only([
    'index', 'show'
]);
Route::resource('/books', BookController::class)->only([
    'store', 'update'
])->middleware('role');
Route::resource('/books', BookController::class)->only([
    'destroy'
])->middleware('role');


Route::resource('categories.books', CategoryBookController::class);
Route::resource('authors.books', AuthorBookController::class);

//Route::get('/authors/{id}/books', [AuthorController::class,'index']);
