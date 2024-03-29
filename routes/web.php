<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    WelcomeController,
    AuthController,
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

// Welcome
Route::get('/', [WelcomeController::class, 'index'])
    ->name('welcome');

// Auth
Route::get('/register', [AuthController::class, 'register'])
    ->name('auth.register');

Route::post('/register', [AuthController::class, 'store'])
    ->name('auth.store');

Route::get('/login', [AuthController::class, 'login'])
    ->name('auth.login');

Route::post('/login', [AuthController::class, 'check'])
    ->name('auth.check');



// Pokemons

Route::get('/pokemons/index', [PokemonsController::class, 'index'])
    ->name('pokemons.index')
    ->middleware('auth');

Route::get('/pokemons/create', [PokemonsController::class, 'create'])
    ->name('pokemons.create');

Route::get('/pokemons/edit/{id}', [PokemonsController::class, 'edit'])
    ->name('pokemons.edit');

Route::get('/pokemons/show/{id}', [PokemonsController::class, 'show'])
    ->name('pokemons.show');

Route::post('/pokemons/store', [PokemonsController::class, 'store'])
    ->name('pokemons.store');

Route::put('/pokemons/update/{id}', [PokemonsController::class, 'update'])
    ->name('pokemons.update');

Route::delete('/pokemons/delete/{id}', [PokemonsController::class, 'delete'])
    ->name('pokemons.delete');


Route::post('/data', [PokemonsController::class, 'data']);


Route::get('/no-json', [WelcomeController::class, 'index'])
    ->middleware('stop.json');
