@extends('layouts.app')

@section('title', 'Pokemons')

@section('content')
    <h1>Pokemons</h1>

    <div>
        {{ $pokemons->links() }}
    </div>

    <table class="table">
        <tr>
            <th>{{ __("Label") }}</th>
            <th>{{ __("Provider name", [], 'fr') }}</th>
            <th>{{ __("Price HT") }}</th>
            <th>{{ __("Created At") }}</th>
            <th>{{ __("Actions") }}</th>
        </tr>
        @foreach($pokemons as $pokemon)
            <tr>
                <td>{{ $pokemon->label }}</td>
                <td>{{ $pokemon->provider_name }}</td>
                <td>{{ $pokemon->price_ht }}</td>
                <td>{{ $pokemon->created_at }}</td>
                <td>
                    <a class="btn btn-primary d-block m-1" href="{{ route('pokemons.show', $pokemon) }}">{{ __("Show") }}</a>
                    <a class="btn btn-warning d-block m-1" href="{{ route('pokemons.edit', $pokemon) }}">{{ __("Edit") }}</a>
                    <form action="{{ route('pokemons.delete', $pokemon) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger d-block w-100" type="submit">{{ __("Delete") }}</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <div>
        {{ $pokemons->links() }}
    </div>
@endsection
