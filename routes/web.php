<?php

use App\Http\Controllers\backend\AdminDashboardController;
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
Route::get('/admin-dashboard',[AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/category/page',[AdminDashboardController::class, 'categoryPage'])->name('category.page');
