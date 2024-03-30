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


//route for admin panel
Route::get('/admin-dashboard',[AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/category/list',[AdminDashboardController::class, 'categoryList'])->name('category.list');
Route::get('/category/page',[AdminDashboardController::class, 'categoryPage'])->name('category.page');
Route::post('/category/store',[AdminDashboardController::class, 'categoryStore'])->name('category.store');
Route::get('/category/update/{id}',[AdminDashboardController::class, 'categoryupdatePage'])->name('category.update.page');
Route::post('/category/update',[AdminDashboardController::class, 'categoryUpdate'])->name('category.update');
Route::get('/category/delete/{id}',[AdminDashboardController::class, 'categoryDelete'])->name('category.delete');
Route::get('/category/status/update/{id}',[AdminDashboardController::class, 'categoryStatusUpdate'])->name('category.status.update');
