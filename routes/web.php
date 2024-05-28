<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;



Route::get('/', [ArticleController::class, 'index'])->name('index');
Route::get('/articles', [ArticleController::class, 'allArticles'])->name('articles');
Route::get('/articles/{id}', [ArticleController::class, 'oneArticleById'])->name('article.show');
Route::get('/backoffice', [ArticleController::class, 'backIndex'])->name('backoffice.index');
Route::get('/backoffice/articles/add', [ArticleController::class, 'create'])->name('backoffice.add');
Route::post('/backoffice/articles', [ArticleController::class, 'store']);
Route::get('/backoffice/articles/update/{id}', [ArticleController::class, 'edit'])->name('backoffice.update');
Route::put('/backoffice/articles/{id}', [ArticleController::class, 'update']);
Route::delete('/backoffice/articles/{id}', [ArticleController::class, 'destroy'])->name('backoffice.delete');
// Route::resource('backoffice/articles', ArticleController::class);
// Route::resource('backoffice/articles/{id}', ArticleController::class);