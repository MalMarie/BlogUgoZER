<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::resource('articles', ArticleController::class);
Route::get('/api/articles', [ArticleController::class, 'getAllArticles']);
