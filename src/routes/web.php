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
    // 商品登録フォーム表示
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    //　商品登録処理
    Route::post('/', [ProductController::class, 'store'])->name('products.store');
    // 商品詳細
    Route::get('/{product}', [ProductController::class, 'show'])->name('products.show');
    // 商品編集フォーム表示
    Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    // 商品の更新処理
    Route::put('/{product}', [ProductController::class, 'update'])->name('products.update');
    // 商品の削除処理
    Route::delete('/{product}', [ProductController::class, 'delete'])->name('products.delete');
    // 検索処理
    Route::get('/search', [ProductController::class, 'search'])->name('products.search');
});

Route::prefix('seasons')->group(function () {});

Route::prefix('product-seasons')->group(function () {});
