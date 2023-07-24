<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';


// Backend All Route
Route::prefix('admin')->group(function(){
    Route::get('/login', [AuthController::class, 'index'])->name('admin.login')->middleware('guest');
    Route::post('/login', [AuthController::class, 'store'])->name('admin.login');

    // Admin Middleware Protected Route
    Route::group(['middleware' => ['admin']], function (){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [AuthController::class, 'destroy'])->name('admin.logout');

        // Category Route
        Route::resource('/categories', CategoryController::class);
        Route::get('/categories/status/{id}',[CategoryController::class, 'status'])->name('categories.status');
    });
});



// Frontend All Route
Route::get('/', [IndexController::class, 'index']);
