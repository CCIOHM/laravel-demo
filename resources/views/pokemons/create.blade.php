@extends('layouts.app')

@section('title', 'Create a pokemon')

@section('content')
    <form action="@route('pokemons.store', ['id'=>'test'])" method="POST">
        @csrf

        <label for="label">Label</label>
        <input type="text"
               name="label"
               id="label"
               value="{{old('label')}}">

        <br>
        <label for="price_ht">Prix HT</label>
        <input type="number"
               name="price_ht"
               id="price_ht"
               value="{{old('price_ht')}}">

        <br>
        <label for="buying_price">Prix d'achat</label>
        <input type="number"
               name="buying_price"
               id="buying_price"
               value="{{old('buying_price')}}">

        <br>
        <label for="description">Description</label>
        <textarea name="description"
                  id="description"
                  cols="30" rows="10">{{old('description')}}</textarea>

        <br>
        <label for="tracking">Enable Tracking ?</label>
        <input type="checkbox"
               name="tracking"
               id="tracking"
            @checked(old('tracking'))>

        <br>
        <input type="submit" value="Créer">
    </form>
@endsection
