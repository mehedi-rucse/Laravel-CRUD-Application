<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books',[BookController::class, 'index'])->name('books.index');

Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books/', [BookController::class, 'store'])->name('books.store');

Route::get('books/download', [BookController::class, 'download'])->name('books.download');
Route::get('books/search', [BookController::class, 'search'])->name('books.search');

Route::get('books/{book}/show', [BookController::class, 'show'])->name('books.show');

Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::patch('/books/{book}', [BookController::class, 'update'])->name('books.update');

Route::delete('books/{book}/destroy', [BookController::class, 'destroy'])->name('books.destroy');