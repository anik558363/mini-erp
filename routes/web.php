<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;



Route::view('/', 'dashboard.index')->name('dashboard');





// product crud


Route::prefix('products')->name('products.')->group(function () {

    Route::get('/', [ProductController::class, 'index'])->name('index');

    Route::get('/create', [ProductController::class, 'create'])->name('create');

    Route::post('/store', [ProductController::class, 'store'])->name('store');

    Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');

    Route::put('/update/{product}', [ProductController::class, 'update'])->name('update');

    Route::delete('/delete/{product}', [ProductController::class, 'destroy'])->name('destroy');
});
