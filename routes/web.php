<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('index');
});
Route::post('login', ['as' => 'login', 'uses' => 'LoginController@do']);