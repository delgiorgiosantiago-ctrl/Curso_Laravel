<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/all', [HomeController::class, 'all'])->name('home.all');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index'); 
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create'); 
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store'); 

Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
