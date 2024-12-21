<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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




Route::group([] , function() {
    // Add this route explicitly for /en or any default language
    Route::get('/', [HomeController::class, 'home'])->name('home'); // Homepage for the language prefix
    Route::get('/product_details/{id}', [ProductController::class, 'productDetails'])->name('product_details');
});


// Routes requiring authentication
Route::group(['middleware' => ['auth', 'verified',]
], function() {
    Route::get('/dashboard', [HomeController::class, 'login_in'])->name('dashboard');
    Route::get('/add_card/{id}', [CartController::class, 'addCard'])->name('add_card');
    Route::get('/show_card', [CartController::class, 'showCard'])->name('show_card');
    Route::post('/add_order', [OrderController::class, 'addOrder'])->name('add_order');
});





// Group all admin routes with the 'admin' prefix and 'auth', 'admin' middleware
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    // Admin dashboard route
    Route::get('dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    // Admin routes for category
    Route::get('view_category', [CategoryController::class, 'viewCategory'])->name('admin.view_category');
    Route::post('save_category', [CategoryController::class, 'addCategory'])->name('admin.save_category');
    Route::get('manage_category', [CategoryController::class, 'allCategory'])->name('admin.manage_category');
    Route::get('delete_category/{id}', [CategoryController::class, 'deleteCategory'])->name('admin.delete_category');
    Route::get('edite_category/{id}', [CategoryController::class, 'editeCategory'])->name('admin.edite_category');
    Route::post('update_category/{id}', [CategoryController::class, 'updateCategory'])->name('admin.update_category');

    // Admin routes for product
    Route::get('add_product', [ProductController::class, 'addProduct'])->name('admin.add_product');
    Route::post('save_product', [ProductController::class, 'saveProduct'])->name('admin.save_product');
    Route::get('show_product', [ProductController::class, 'showProduct'])->name('admin.show_product');
    Route::get('delete_product/{id}', [ProductController::class, 'deleteProduct'])->name('admin.delete_product');
    Route::get('edite_product/{id}', [ProductController::class, 'editeProduct'])->name('admin.edite_product');
    Route::post('update_product/{id}', [ProductController::class, 'updateProduct'])->name('admin.update_product');
    Route::get('search_product', [ProductController::class, 'searchProduct'])->name('admin.search_product');
});





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


