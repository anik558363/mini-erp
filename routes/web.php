<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PurchaseRequisitionController;
use App\Http\Controllers\PurchaseOrderController;




use App\Http\Controllers\DashboardController;


Route::get(
    '/',
    [DashboardController::class, 'index']
)->name('dashboard');


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
    Route::get('/', [DepartmentController::class, 'index'])
        ->name('index');
    Route::get('/create', [DepartmentController::class, 'create'])
        ->name('create');
    Route::post('/store', [DepartmentController::class, 'store'])
        ->name('store');
    Route::get('/edit/{department}', [DepartmentController::class, 'edit'])
        ->name('edit');
    Route::put('/update/{department}', [DepartmentController::class, 'update'])
        ->name('update');
    Route::delete('/delete/{department}', [DepartmentController::class, 'destroy'])
        ->name('destroy');
});






// employee crud

Route::prefix('employees')->name('employees.')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])
        ->name('index');
    Route::get('/create', [EmployeeController::class, 'create'])
        ->name('create');
    Route::post('/store', [EmployeeController::class, 'store'])
        ->name('store');
    Route::get('/edit/{employee}', [EmployeeController::class, 'edit'])
        ->name('edit');
    Route::put('/update/{employee}', [EmployeeController::class, 'update'])
        ->name('update');
    Route::delete('/delete/{employee}', [EmployeeController::class, 'destroy'])
        ->name('destroy');
});



// Purchase Requisition

Route::prefix('purchase-requisitions')->name('purchase-requisitions.')->group(function () {
    Route::get('/', [PurchaseRequisitionController::class, 'index'])
        ->name('index');
    Route::get('/create', [PurchaseRequisitionController::class, 'create'])
        ->name('create');
    Route::post('/store', [PurchaseRequisitionController::class, 'store'])
        ->name('store');

        Route::put('/approve/{purchaseRequisition}',
    [PurchaseRequisitionController::class,'approve']
)->name('approve');


Route::put('/reject/{purchaseRequisition}',
    [PurchaseRequisitionController::class,'reject']
)->name('reject');
});



// Purchase Order

Route::prefix('purchase-orders')
    ->name('purchase-orders.')
    ->group(function () {


    Route::get('/',
        [PurchaseOrderController::class,'index']
    )->name('index');



    Route::get('/create',
        [PurchaseOrderController::class,'create']
    )->name('create');



    Route::post('/store',
        [PurchaseOrderController::class,'store']
    )->name('store');


});
