<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    WelcomeController,
    PokemonsController,
    UsersController,
};

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

Route::get('/', [WelcomeController::class, 'index'])
    ->name('welcome');

Route::get('/pokemons/index', [PokemonsController::class, 'index'])
    ->name('pokemons.index');

Route::get('/pokemons/create', [PokemonsController::class, 'create'])
    ->name('pokemons.create');

Route::get('/pokemons/show/{id}', [PokemonsController::class, 'show'])
    ->name('pokemons.show');

Route::post('/pokemons/store', [PokemonsController::class, 'store'])
    ->name('pokemons.store');

Route::put('/pokemons/update/{id}', [PokemonsController::class, 'update'])
    ->name('pokemons.update');

Route::delete('/pokemons/delete/{id}', [PokemonsController::class, 'delete'])
    ->name('pokemons.delete');


Route::post('/data', [PokemonsController::class, 'data']);




Route::get('/users/index', [UsersController::class, 'index'])
    ->name('users.index');