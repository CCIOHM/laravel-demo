@extends('layouts.app')

@section('title', 'Edit a pokemon')

@section('content')
    <a href="{{ route('pokemon.index') }}">List of pokemons</a>
    <a href="{{ route('pokemon.create') }}">Create a pokemon</a>

    <p>
        {{ $lorem }}
    </p>
    <p>
        {{ $ipsum }}
    </p>
@endsection
