<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::match(
    ['get', 'post'],
    'books/search',
    [BookController::class, 'search']
)->name('books.search');

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');

Route::post('/books', [BookController::class, 'store'])->name('books.store');

Route::patch('/books/{id}', [BookController::class, 'update'])->name('books.update');

Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

Route::options('/books', function () {
    response()->noContent();
    // return response('Mantap Wak!', 200);
    // return response()->json([
    //     'message' => 'Endpoint books tersedia',
    //     'allowed_methods' => ['GET', 'POST', 'OPTIONS'],
    //     'parameters' => [
    //         'GET' => 'Mengambil daftar produk',
    //         'POST' => 'Menambahkan produk baru'
    //     ]
    // ], 200);
});

// Route::head('/books', function () {
//     return response()->noContent();
// });
// Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
//
// Route::post('/products', [\App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
//
// Route::delete('/products/{product}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');
//
// Route::put('/products/{product}', [\App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
//
// Route::get('/products/{product}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');

Route::resource('/products', \App\Http\Controllers\ProductController::class);
