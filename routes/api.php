<?php

use App\Http\Controllers\Api\AuthorsController;
use App\Http\Controllers\Api\BookLogController;
use App\Http\Controllers\Api\BooksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
 * Library rest api interface
 */

/*
 * apiResource methods:
 * GET           /users                      index   users.index
 * POST          /users                      store   users.store
 * GET           /users/{user}               show    users.show
 * PUT|PATCH     /users/{user}               update  users.update
 * DELETE        /users/{user}               destroy users.destroy
 */

// Добавить автора
Route::apiResource('authors', AuthorsController::class)->only([
    'index',
    'store',
]);
Route::get('/authors/search/{search}', [AuthorsController::class, 'search']);

// Списать книгу, Получить все книги, Добавить книгу с указанием авторов
Route::apiResource('books', BooksController::class)->except([
    'update',
]);

// Выдать книгу читателю
Route::apiResource('books_log', BookLogController::class)->only([
    'index',
    'store',
]);
