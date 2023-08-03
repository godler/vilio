<?php

use Illuminate\Support\Facades\Route;



Route::prefix('products')->name('products.')->group(function(){
    Route::get('/', \App\Livewire\Catalog\Products\Index::class)->name('index');
});

Route::prefix('category')->name('category.')->group(function(){
    Route::get('/', \App\Livewire\Catalog\Category\Index::class)->name('index');
});

Route::prefix('customer')->name('customer.')->group(function(){
    Route::get('/', \App\Livewire\Catalog\Customer\Index::class)->name('index');
});