<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProductsController;



Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/log', [LogController::class, 'getLogs'])->name('log');


Route::get('/produtos', [ProductsController::class, 'getProdutos'])->name('produtos');

Route::post('/produto/update/{id}', [ProductsController::class, 'updateProduto'])->name('products.update');
Route::post('/produto/insert/{id}', [ProductsController::class, 'insertProduto'])->name('products.insert');

Route::delete('/produto/{id}', [ProductsController::class, 'destroyProduto'])->name('products.destroy');
