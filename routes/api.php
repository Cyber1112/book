<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/admin/login', [AdminController::class, 'login']);

Route::get('/books', [BookController::class, 'books']);
Route::post('/books/add', [BookController::class, 'addBook']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/show/users', [AuthController::class, 'user']);


    // ADMIN 
    Route::prefix('admin')->group(function () {

        Route::get('/books', [BookController::class, 'books']);
        Route::get('/findByAuthor/{name}/{surname}', [BookController::class, 'findByAuthor']);
        Route::post('/books/add', [BookController::class, 'addBook']);
        Route::post('book/delete/{id}', [BookController::class, 'deleteBook']);
        Route::get('book/find/{id}', [BookController::class, 'findBook']);
        Route::post('book/update/{id}', [BookController::class, 'updateBook']);

    });

});