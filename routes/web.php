<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return redirect()->route('movies.index');
});

Route::resource('movies', MovieController::class);
Route::post('/movies/{movie}/like', [MovieController::class, 'like'])->name('movies.like');
Route::post('/movies/{movie}/dislike', [MovieController::class, 'dislike'])->name('movies.dislike');

