<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\UnitController;
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
Route::prefix('/admin')->group(function(){
    Route::get('/login', [AuthController::class, 'index'])->name('admin.login')->middleware('guest');
    Route::post('/login', [AuthController::class, 'store'])->name('admin.login');

    // Admin Middleware Protected Route
    Route::group(['middleware' => ['admin']], function (){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [AuthController::class, 'destroy'])->name('admin.logout');

        // Category Route
        Route::resource('/categories', CategoryController::class);
        Route::get('/categories/status/{id}',[CategoryController::class, 'status'])->name('categories.status');

        // Sub Category Route
        Route::resource('/sub-categories', SubCategoryController::class);
        Route::get('/sub-categories/status/{subCategory}',[SubCategoryController::class, 'status'])->name('sub-categories.status');

        // Brand Route
        Route::resource('/brands', BrandController::class);
        Route::get('/brands/status/{brand}',[BrandController::class, 'status'])->name('brands.status');

        // Unit Route
        Route::resource('/units', UnitController::class);
        Route::get('/units/status/{unit}',[UnitController::class, 'status'])->name('units.status');

        // Size Route
        Route::resource('/sizes', SizeController::class);
        Route::get('/sizes/status/{size}',[SizeController::class, 'status'])->name('sizes.status');

        // Color Route
        Route::resource('/colors', ColorController::class);
        Route::get('/colors/status/{color}',[ColorController::class, 'status'])->name('colors.status');

        // Product Route
        Route::resource('/products', ProductController::class);
        Route::get('/products-subcategory',[ProductController::class, 'subcategory'])->name('products.subcategory');
        Route::get('/products/status/{product}',[ProductController::class, 'status'])->name('products.status');
    });
});



// Frontend All Route
Route::get('/', [IndexController::class, 'index']);
Route::get('/product-details/{id}', [IndexController::class, 'productDetails'])->name('product.details');
Route::get('/product-category/{id}', [IndexController::class, 'productCategory'])->name('product.category');
