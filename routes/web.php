<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[ProductController::class,'index'])->name('product');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product',[ProductController::class,'store'])->name('product.store');
Route::put('/product/{id}',[ProductController::class,'update'])->name('product.update');
Route::get('/product/{id}',[ProductController::class,'updateForm'])->name('product.updateForm');
Route::delete('/product/{id}',[ProductController::class,'delete'])->name('product.delete');
