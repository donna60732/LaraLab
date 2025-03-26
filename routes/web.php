<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\MessageController;

Route::resource('articles', ArticlesController::class);

// 設定 articles.index.php 為首頁
Route::get('/', [ArticlesController::class, 'index'])->name('root');
// Route::get('/', function () {
//     return Auth::check() ? redirect()->route('root') : redirect()->route('login');
// });



// 設定 messages 的路由
Route::resource('messages', MessageController::class)->middleware('auth');


// Jetstream 登入頁面的路由
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
