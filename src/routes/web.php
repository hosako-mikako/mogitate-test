<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\ProductSeasonController;

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

Route::prefix('products')->group(function () {
    // 商品一覧
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    // 登録画面表示
    Route::get('/register', [ProductController::class, 'create'])->name('products.create');
    // 登録処理
    Route::post('/register', [ProductController::class, 'store'])->name('products.store');
    // 検索
    Route::get('/search', [ProductController::class, 'search'])->name('products.search');
    // 商品詳細
    Route::get('/{productId}', [ProductController::class, 'show'])->name('products.show');
    // 更新画面表示
    Route::get('/{productId}/edit', [ProductController::class, 'edit'])->name('products.edit');
    // 更新処理
    Route::put('/{productId}/update', [ProductController::class, 'update'])->name('products.update');
    // 削除
    Route::post('/{productId}/delete', [ProductController::class, 'destroy'])->name('products.destroy');
});

