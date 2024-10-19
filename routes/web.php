<?php

use App\Http\Controllers\PokedexController;
use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('pokemon', PokemonController::class);
Route::resource('pokemon', PokemonController::class)->middleware('auth'); 
Route::get('/pokemons/create', [PokemonController::class]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', PokedexController::class);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');



