<?php

use Illuminate\Support\Facades\Route;




Route::get('/', \App\Livewire\Offer\Index::class)->name('index');