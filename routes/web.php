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

Route::get('/',[HomeController::class,'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard' ,[HomeController::class,'index'])->middleware('auth','admin');
Route::get('admin/view_category' ,[AdminController::class,'viewCategory'])->middleware('auth','admin');
Route::post('admin/save_category' ,[AdminController::class,'addCategory'])->middleware('auth','admin');
Route::get('admin/manage_category' ,[AdminController::class,'allCategory'])->middleware('auth','admin');
Route::get('admin/delete_category/{id}' ,[AdminController::class,'deleteCategory'])->middleware('auth','admin');
Route::get('admin/edite_category/{id}' ,[AdminController::class,'editeCategory'])->middleware('auth','admin');
Route::post('admin/update_category/{id}' ,[AdminController::class,'updateCategory'])->middleware('auth','admin');
