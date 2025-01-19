<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\TransactionProductController;

// Products API routes
Route::apiResource('products', ProductController::class);

// Transactions API routes
Route::apiResource('transactions', TransactionController::class);

// Transaction-Products API routes
Route::apiResource('transaction-products', TransactionProductController::class);
