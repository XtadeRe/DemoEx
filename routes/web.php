<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RegisterController::class, 'index'])->name('registration.index');
Route::post('/registration', [RegisterController::class, 'store'])->name('registration.store');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::post('/order/comment', [OrderController::class, 'addComment'])->name('order.addComment');
Route::post('/order/{id}', [OrderController::class, 'update'])->name('order.update');



Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
