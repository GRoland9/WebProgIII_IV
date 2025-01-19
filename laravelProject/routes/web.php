<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionProductController;

Route::get('/', function () {
    return view('welcome');
});

// CRUD útvonalak
Route::resource('transactions', TransactionController::class);
Route::resource('products', ProductController::class);
Route::resource('transaction-products', TransactionProductController::class);
