<?php

use Illuminate\Support\Facades\Route;




Route::get('/', \App\Livewire\Offer\Index::class)->name('index');
Route::get('/add', \App\Livewire\Offer\Form::class)->name('create');
Route::get('/{offer}', \App\Livewire\Offer\Form::class)->name('edit');