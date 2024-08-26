<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminContactController;


// お問い合わせ

// お問い合わせ入力フォームの表示
Route::get('/', [ContactController::class, 'index'])->name('contacts.index');
// お問い合わせ確認画面の表示
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
// データの保存と完了ページの表示
Route::post('/contacts', [ContactController::class, 'store']);



// ユーザー認証

// Route::get('/', [AuthController::class, 'index']);

Route::middleware('auth')->group(function () {
Route::get('/admin', [AuthController::class, 'admin']);
});


// 管理画面

Route::get('/admin', [AdminContactController::class, 'admin']);
Route::get('/contacts/search', [AdminContactController::class, 'search']);
