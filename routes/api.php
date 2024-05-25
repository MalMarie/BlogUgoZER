<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;


// Route::resource('articles', ArticleController::class);
Route::get('/all-articles', [ArticleController::class, 'showAll']);
Route::get('/latest-articles', [ArticleController::class, 'showLastFive']);
Route::get('/article/{id}', [ArticleController::class, 'oneArticleById']);

