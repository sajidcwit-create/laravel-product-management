<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| NOTE: Static segment routes (e.g. /products/json) are declared BEFORE
| the dynamic /products/{product} route, otherwise Laravel would try to
| match words like "json" or "create" as the {product} id.
*/

// Task 7: Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Task 1: Routes, Controllers & Responses
Route::get('/products', [ProductController::class, 'index'])->name('products.index');               // View Response
Route::get('/products/json', [ProductController::class, 'indexJson'])->name('products.json');        // JSON Response
Route::get('/products/redirect-demo', [ProductController::class, 'redirectDemo'])->name('products.redirect-demo'); // Redirect Response

// Task 4: Session & Logging (Create form)
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/confirmation/{product}', [ProductController::class, 'confirmation'])->name('products.confirmation');

// Task 5: Query Builder Practice
Route::get('/products/query-demo', [ProductController::class, 'queryDemo'])->name('products.query-demo');

// Task 1: Product Details (dynamic - must stay below the static routes above)
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Task 6: Eloquent ORM (Category -> Products relationship)
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
