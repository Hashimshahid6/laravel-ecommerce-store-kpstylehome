<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
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
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/admin/list', [AdminController::class, 'list'])->name('admin.list');
    Route::get('/admin/admin/add', [AdminController::class, 'add'])->name('admin.add');
    Route::post('/admin/admin/add', [AdminController::class, 'insert'])->name('admin.insert');
    Route::get('/admin/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/admin/edit/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/admin/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');

    Route::get('/admin/category/list', [CategoryController::class, 'list'])->name('category.list');
    Route::get('/admin/category/add', [CategoryController::class, 'add'])->name('category.add');
    Route::post('/admin/category/add', [CategoryController::class, 'insert'])->name('category.insert');
    Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/admin/category/edit/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('/admin/sub_category/list', [SubCategoryController::class, 'list'])->name('sub_category.list');
    Route::get('/admin/sub_category/add', [SubCategoryController::class, 'add'])->name('sub_category.add');
    Route::post('/admin/sub_category/add', [SubCategoryController::class, 'insert'])->name('sub_category.insert');
    Route::get('/admin/sub_category/edit/{id}', [SubCategoryController::class, 'edit'])->name('sub_category.edit');
    Route::post('/admin/sub_category/edit/{id}', [SubCategoryController::class, 'update'])->name('sub_category.update');
    Route::get('/admin/sub_category/delete/{id}', [SubCategoryController::class, 'delete'])->name('sub_category.delete');

    Route::get('/admin/product/list', [ProductController::class, 'list'])->name('product.list');
    Route::get('/admin/product/add', [ProductController::class, 'add'])->name('product.add');
    Route::post('/admin/product/add', [ProductController::class, 'insert'])->name('product.insert');
    Route::get('/admin/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/admin/product/edit/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/admin/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

});
