<?php

use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/pokemon', PokemonController::class);

Route::get('/pokemons/create', [PokemonController::class, 'create'])->name('pokemons.create');

