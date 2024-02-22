@extends('layouts.app')

@section('title', 'Welcome to Pokemon land !')

@section('content')
    <h1>Welcome to Pokemon land !</h1>
    <p>Here you can find all the pokemons you want !</p>
    <p>Click <a href="{{ route('pokemons.index') }}">here</a> to see all the pokemons !</p>
@endsection
