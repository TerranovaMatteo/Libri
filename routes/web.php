<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;

Route::resource('authors', AuthorController::class);
Route::resource('categories', CategoryController::class);
Route::resource('books', BookController::class);
Route::redirect('/', '/books');
