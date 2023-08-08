<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')
    ->name('catalog.')
    ->prefix('/catalog')        
    ->group(__DIR__.'/web/catalog.php');



Route::middleware('auth')
    ->prefix('/offer')
    ->name('offer.')
    ->group(__DIR__.'/web/offer.php');


Route::middleware('auth')
    ->prefix('/template')
    ->name('template.')
    ->group(function() {
        Route::get('/', \App\Livewire\Template\Index::class);
        Route::get('/{id}', \App\Livewire\Template\Editor::class);
    });

Route::get('/counter', \App\Livewire\Counter::class)->name('counter');

require __DIR__.'/auth.php';
