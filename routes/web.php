<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\MessageController;


Route::resource('articles', ArticlesController::class);
Route::get('/', [ArticlesController::class, 'index'])->name('root');
Route::resource('messages', MessageController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
