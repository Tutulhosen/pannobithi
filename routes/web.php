<?php

use App\Http\Controllers\backend\AdminDashboardController;
use App\Http\Controllers\backend\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontendController::class, 'home'])->name('home');

Route::name('category.')->prefix('category')->group(function () {
    Route::get('/men/{id}', [FrontendController::class, 'showSubCategory'])->name('men');
});

Route::name('product.')->prefix('product')->group(function () {
    Route::get('/show/{id}', [FrontendController::class, 'showProduct'])->name('show');
});


//route for admin panel

//dashboard route
Route::name('admin.dashboard.')->prefix('admin/dashboard')->group(function(){
    Route::get('/index',[AdminDashboardController::class, 'dashboard'])->name('index');

});
// category route
Route::name('admin.category.')->prefix('admin/category')->group(function () {
    Route::get('/list',[AdminDashboardController::class, 'categoryList'])->name('list');
    Route::get('/page',[AdminDashboardController::class, 'categoryPage'])->name('page');
    Route::post('/store',[AdminDashboardController::class, 'categoryStore'])->name('store');
    Route::get('/update/{id}',[AdminDashboardController::class, 'categoryupdatePage'])->name('update.page');
    Route::post('/update',[AdminDashboardController::class, 'categoryUpdate'])->name('update');
    Route::get('/delete/{id}',[AdminDashboardController::class, 'categoryDelete'])->name('delete');
    Route::get('/status/update/{id}',[AdminDashboardController::class, 'categoryStatusUpdate'])->name('status.update');
});


// sub category route 
Route::name('admin.sub.cat.')->prefix('admin/sub/cat')->group(function () {
    Route::get('/list',[AdminDashboardController::class, 'subcategoryList'])->name('list');
    Route::get('/create',[AdminDashboardController::class, 'subCatCreate'])->name('create');
    Route::post('/store',[AdminDashboardController::class, 'subcategoryStore'])->name('store');
    Route::get('/update/{id}',[AdminDashboardController::class, 'subcategoryupdatePage'])->name('update.page');
    Route::post('/update',[AdminDashboardController::class, 'subcategoryUpdate'])->name('update');
    Route::get('/delete/{id}',[AdminDashboardController::class, 'subcategoryDelete'])->name('delete');
    Route::get('/status/update/{id}',[AdminDashboardController::class, 'subcategoryStatusUpdate'])->name('status.update');
    
});

// sub category route 
Route::name('admin.product.')->prefix('admin/product')->group(function () {
    Route::get('/list',[ProductController::class, 'productList'])->name('list');
    Route::get('/create',[ProductController::class, 'productCreate'])->name('create');
    Route::post('/store',[AdminDashboardController::class, 'subcategoryStore'])->name('store');
    Route::get('/update/{id}',[AdminDashboardController::class, 'subcategoryupdatePage'])->name('update.page');
    Route::post('/update',[AdminDashboardController::class, 'subcategoryUpdate'])->name('update');
    Route::get('/delete/{id}',[AdminDashboardController::class, 'subcategoryDelete'])->name('delete');
    Route::get('/status/update/{id}',[AdminDashboardController::class, 'subcategoryStatusUpdate'])->name('status.update');
    
});
