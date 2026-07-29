<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DepartmentController;







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


// supplier crud

Route::prefix('suppliers')->name('suppliers.')->group(function () {
    Route::get('/', [SupplierController::class, 'index'])->name('index');
    Route::get('/create', [SupplierController::class, 'create'])->name('create');
    Route::post('/store', [SupplierController::class, 'store'])->name('store');
    Route::get('/edit/{supplier}', [SupplierController::class, 'edit'])->name('edit');
    Route::put('/update/{supplier}', [SupplierController::class, 'update'])->name('update');
    Route::delete('/delete/{supplier}', [SupplierController::class, 'destroy'])->name('destroy');

});




// department crud

Route::prefix('departments')->name('departments.')->group(function () {
    Route::get('/', [DepartmentController::class,'index'])
        ->name('index');
    Route::get('/create', [DepartmentController::class,'create'])
        ->name('create');
    Route::post('/store', [DepartmentController::class,'store'])
        ->name('store');
    Route::get('/edit/{department}', [DepartmentController::class,'edit'])
        ->name('edit');
    Route::put('/update/{department}', [DepartmentController::class,'update'])
        ->name('update');
    Route::delete('/delete/{department}', [DepartmentController::class,'destroy'])
        ->name('destroy');
});
