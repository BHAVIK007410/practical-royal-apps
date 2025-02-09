<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Route;

Route::middleware([CheckAuth::class])->group(function () {
    # Auth
    Route::get('/', [SiteController::class, 'login'])->name('login');
    Route::get('/login', [SiteController::class, 'login'])->name('login');
    Route::post('/do-login', [SiteController::class, 'doLogin'])->name('do-login');
    Route::get('/logout', [SiteController::class, 'logout'])->name('logout');

    # Dashboard
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    # Author
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors');
    Route::delete('/authors/delete/{id}', [AuthorController::class, 'delete'])->name('author.delete');
    Route::get('/authors/view/{id}', [AuthorController::class, 'author'])->name('author.view');

    # Books
    Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/books/store', [BookController::class, 'store'])->name('book.store');
    Route::delete('/book/delete/{id}', [BookController::class, 'delete'])->name('book.delete');
});
