@extends('layouts.app')

@section('title', 'Show Pokémon')

@section('content')
<div class="container">
    <h1>Pokemon Details: {{ $pokemon->name }}</h1>

    <div class="card mb-3">
        <div class="row g-0">
            <!-- Pokémon Image -->
            <div class="col-md-4">
                @if ($pokemon->photo)
                    <img src="{{ asset('storage/' . $pokemon->photo) }}" alt="{{ $pokemon->name }}" class="img-fluid rounded-start">
                @else
                    <img src="https://via.placeholder.com/300" alt="{{ $pokemon->name }}" class="img-fluid rounded-start">
                @endif
            </div>

            <!-- Pokémon Details -->
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $pokemon->name }}</h5>
                    <p class="card-text">
                        <strong>Species:</strong> {{ $pokemon->species }}<br>
                        <strong>Primary Type:</strong> {{ $pokemon->primary_type }}<br>
                        <strong>Weight:</strong> {{ $pokemon->weight }} kg<br>
                        <strong>Height:</strong> {{ $pokemon->height }} m<br>
                        <strong>HP:</strong> {{ $pokemon->hp }}<br>
                        <strong>Attack:</strong> {{ $pokemon->attack }}<br>
                        <strong>Defense:</strong> {{ $pokemon->defense }}<br>
                        <strong>Legendary:</strong> {{ $pokemon->is_legendary ? 'Yes' : 'No' }}<br>
                    </p>
                    <p class="card-text">
                        <small class="text-muted">Last updated {{ $pokemon->updated_at->diffForHumans() }}</small>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <a href="{{ route('pokemon.edit', $pokemon->id) }}" class="btn btn-primary">Edit Pokemon</a>

    <!-- Delete Button -->
    <form action="{{ route('pokemon.destroy', $pokemon->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Pokémon?')">Delete</button>
    </form>

    <a href="{{ route('pokemon.index') }}" class="btn btn-secondary">Back to Pokemon List</a>
</div>
@endsection
