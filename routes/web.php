<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


// home routes

Route::get('/',[HomeController::class,'home']);
Route::get('/product_details/{id}',[HomeController::class,'productDetails']);
Route::get('/dashboard',[HomeController::class,'login_in'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/add_card/{id}',[HomeController::class,'addCard'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// admin routes for category

Route::get('admin/dashboard' ,[HomeController::class,'index'])->middleware('auth','admin');
Route::get('admin/view_category' ,[AdminController::class,'viewCategory'])->middleware('auth','admin');
Route::post('admin/save_category' ,[AdminController::class,'addCategory'])->middleware('auth','admin');
Route::get('admin/manage_category' ,[AdminController::class,'allCategory'])->middleware('auth','admin');
Route::get('admin/delete_category/{id}' ,[AdminController::class,'deleteCategory'])->middleware('auth','admin');
Route::get('admin/edite_category/{id}' ,[AdminController::class,'editeCategory'])->middleware('auth','admin');
Route::post('admin/update_category/{id}' ,[AdminController::class,'updateCategory'])->middleware('auth','admin');


// admin routes for product
Route::get('admin/add_product' ,[AdminController::class,'addProduct'])->middleware('auth','admin');
Route::post('admin/save_product' ,[AdminController::class,'saveProduct'])->middleware('auth','admin');
Route::get('admin/show_product' ,[AdminController::class,'showProduct'])->middleware('auth','admin');
Route::get('admin/delete_product/{id}' ,[AdminController::class,'deleteProduct'])->middleware('auth','admin');
Route::get('admin/edite_product/{id}',[AdminController::class,'editeProduct'])->middleware('auth','admin');
Route::post('admin/update_product/{id}',[AdminController::class,'updateProduct'])->middleware('auth','admin');
Route::get('admin/search_product',[AdminController::class,'searchProduct'])->middleware('auth','admin');
