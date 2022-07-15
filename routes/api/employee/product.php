<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\Product\BrandController;
use App\Http\Controllers\Employee\Product\ProductController;
use App\Http\Controllers\Employee\Product\CategoryController;
use App\Http\Controllers\Employee\Product\LocationController;
use App\Http\Controllers\Employee\Product\SupplierController;
Route::apiResources([
    'product' => ProductController::class,
    'category' => CategoryController::class,
    'supplier' => SupplierController::class,
    'brand' => BrandController::class,
    'location' => LocationController::class,
]);
