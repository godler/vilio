<?php
use Illuminate\Support\Facades\Route;

Route::get('/' , function(){
    return view('components.pages.settings.index');
})->name('index');
Route::get('/edit' , App\Livewire\Settings\Form::class)->name('index');

Route::prefix('/template')
    ->name('template.')
    ->group(function() {
        Route::get('/', \App\Livewire\Template\Index::class)->name('index');
        Route::get('/{id}', \App\Livewire\Template\Editor::class)->name('editor');
    });