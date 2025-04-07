<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mews\Captcha\Facades\Captcha;


// 設定 articles.index.php 為首頁
// Route::get('/', [ArticlesController::class, 'index'])->name('root');
Route::get('/', function () {
    return view('home');
});

// 使用 Resource Controller 管理文章/管理留言

Route::resource('articles', ArticlesController::class);
Route::resource('messages', MessageController::class);

// Jetstream 登入頁面的路由
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
// 登出
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// 	驗證碼驗證處理
Route::post('/captcha-validate', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'captcha' => 'required|captcha'
    ]);

    if ($validator->fails()) {
        return back()->withErrors(['captcha' => '驗證碼錯誤，請再試一次！'])->withInput();
    }

    return back()->with('success', '驗證碼正確！');
})->name('captcha.validate');

// AJAX 動態刷新驗證碼圖片
Route::get('/reload-captcha', function () {
    return response()->json(['captcha' => Captcha::src()]);
})->name('captcha.reload');
