@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pokedex</h1>
    <div class="row">
        @foreach ($pokemons as $pokemon)
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="{{ asset($pokemon->photo) }}" class="card-img-top" alt="{{ $pokemon->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $pokemon->name }}</h5>
                    <p class="card-text">ID: {{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</p>
                    <p class="card-text">Type: {{ $pokemon->primary_type }}</p>
                    <a href="{{ route('pokemon.show', $pokemon) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{ $pokemons->links() }} <!-- Pagination -->
</div>
@endsection
