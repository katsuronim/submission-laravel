<?php

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




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\ArtikelController::class, 'guest'])->name('artikel.dashboard');
Route::view('/AboutMe', 'aboutme')->name('AboutMe');
Route::group([
    'prefix' => '/artikel',
    'as' => 'artikel.',
  ], function () {
     Route::get('/guest/{artikel}', [ \App\Http\Controllers\ArtikelController::class, 'showGuest'])->name('showGuest');
  });



//Route::resource('/artikel', \App\Http\Controllers\ArtikelController::class);
Route::middleware(['auth', 'cekLogin'])->group(function () {
    Route::group([
        'prefix' => '/artikel',
        'as' => 'artikel.',
      ], function () {
          Route::get('/', [ \App\Http\Controllers\ArtikelController::class, 'index'])->name('index');
          Route::post('/', [ \App\Http\Controllers\ArtikelController::class, 'store'])->name('store');
          Route::get('/create', [ \App\Http\Controllers\ArtikelController::class, 'create'])->name('create');
          Route::get('/{artikel}', [ \App\Http\Controllers\ArtikelController::class, 'show'])->name('show');
          Route::put('/{artikel}', [ \App\Http\Controllers\ArtikelController::class, 'update'])->name('update');
          Route::delete('/{artikel}', [ \App\Http\Controllers\ArtikelController::class, 'destroy'])->name('destroy');
          Route::get('/{artikel}/edit', [ \App\Http\Controllers\ArtikelController::class, 'edit'])->name('edit');
      });

    Route::group([
        'prefix' => '/tags',
        'as' => 'tags.',
      ], function () {
          Route::get('/', [ \App\Http\Controllers\TagsController::class, 'index'])->name('index');
          Route::post('/', [ \App\Http\Controllers\TagsController::class, 'store'])->name('store');
          Route::get('/create', [ \App\Http\Controllers\TagsController::class, 'create'])->name('create');
          Route::get('/{tags}', [ \App\Http\Controllers\TagsController::class, 'show'])->name('show');
          Route::put('/{tags}', [ \App\Http\Controllers\TagsController::class, 'update'])->name('update');
          Route::delete('/{tags}', [ \App\Http\Controllers\TagsController::class, 'destroy'])->name('destroy');
          Route::get('/{tags}/edit', [ \App\Http\Controllers\TagsController::class, 'edit'])->name('edit');
      });

    Route::view('/AboutMeWriter', 'artikel/aboutmewriter')->name('artikel.AboutMeWriter');
    Route::resource('/kategori', \App\Http\Controllers\KategoriController::class);
});


