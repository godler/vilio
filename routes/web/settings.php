<?php
use Illuminate\Support\Facades\Route;

Route::get('/' , App\Livewire\Settings\Form::class)->name('index');