<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', [ArticleController::class, 'index'])->name('index');
Route::get('/articles', [ArticleController::class, 'allArticles'])->name('articles');
Route::get('/article/{id}', [ArticleController::class, 'oneArticleById'])->name('article.show');

// Route::post('login', ['as' => 'login', 'uses' => 'LoginController@do']);