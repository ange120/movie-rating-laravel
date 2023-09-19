<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieRatingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('main.index');

Route::post('get-list', [MainController::class, 'getListToRegin'])->name('listRegion');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'login'])->name('register');


Route::prefix('/movies')->group(function () {
    Route::get('/index', [MovieRatingController::class, 'index'])->name('movies.index');
    Route::get('/{id}/rate', [MovieRatingController::class, 'showRateForm'])->name('movies.rate');
    Route::get('/{id}/edit-rating', [MovieRatingController::class, 'editRatingForm'])->name('movies.editRating');
    Route::put('/{id}/update-rating', [MovieRatingController::class, 'updateRating'])->name('movies.updateRating');
    Route::post('/{id}/rate', [MovieRatingController::class, 'storeRating'])->name('movies.storeRating');
    Route::delete('/{id}/delete-rating', [MovieRatingController::class, 'deleteRating'])->name('movies.deleteRating');
});

