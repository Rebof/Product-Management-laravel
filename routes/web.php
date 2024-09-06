<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Route for the welcome page
Route::get('/', [ProductController::class, 'display'])->name('welcome');

//create
route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

//delete
Route::delete('/products/{id}/delete', [ProductController::class, 'delete'])->name("delete");

// Route to show the edit form
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
// Route to handle the form submission for updating the product
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');