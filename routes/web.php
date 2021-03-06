<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/article/{id}', function ($id) {
    return view('welcome', compact('id'));
});
Route::get('/{id}', [App\Http\Controllers\article\articleController::class , 'getArticleDetails' ]);
Route::post('/comments/new', [App\Http\Controllers\article\articleController::class , 'submitNewComment' ]);
