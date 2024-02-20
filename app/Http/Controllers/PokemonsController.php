<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PokemonsController extends Controller
{
    public function data(Request $request)
    {
        return response()->json([
            'var1' => $request->var1,
            'var2' => $request->var2,
            'var3' => $request->var3,
        ]);
    }

    public function index()
    {
        return view('pokemons.index');
    }

    public function create()
    {
        return view('pokemons.create');
    }

    public function store(Request $request)
    {
        dd('Comming soon');
        return back();
    }

    public function show(int $id)
    {
        dd('Comming soon');
//        return view('pokemons.show');
    }

    public function edit(int $id)
    {
        return view('pokemons.edit', [
            'lorem' => 'lorem',
            'ipsum' => 'ipsum',
            'pokemons' => Pokemon::all(),
        ]);
    }

    public function update(Request $request, int $id)
    {
        dd('Comming soon');
        return back();
    }

    public function delete(int $id)
    {
        dd('Comming soon');
        return back();
    }
}
