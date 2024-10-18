<?php

use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('pokemon', PokemonController::class)->middleware('auth'); 
Route::get('/pokemons/create', [PokemonController::class, 'create'])->name('pokemons.create');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

