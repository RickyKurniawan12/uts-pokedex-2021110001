@extends('layouts.template')

@section('title', 'Update Pokemon')

@section('body')
<div class="container">
    <h1>Edit Pokemon: {{ $pokemon->name }}</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form to edit Pokemon -->
    <form action="{{ route('pokemon.update', $pokemon->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $pokemon->name) }}" required placeholder="Enter Pokémon name">
        </div>

        <div class="form-group">
            <label for="species">Species:</label>
            <input type="text" name="species" class="form-control" value="{{ old('species', $pokemon->species) }}" required placeholder="Enter species">
        </div>

        <div class="form-group">
            <label for="primary_type">Primary Type:</label>
            <input type="text" name="primary_type" class="form-control" value="{{ old('primary_type', $pokemon->primary_type) }}" required placeholder="Enter primary type">
        </div>

        <div class="form-group">
            <label for="weight">Weight:</label>
            <input type="number" step="0.01" name="weight" class="form-control" value="{{ old('weight', $pokemon->weight) }}" placeholder="Enter weight">
        </div>

        <div class="form-group">
            <label for="height">Height:</label>
            <input type="number" step="0.01" name="height" class="form-control" value="{{ old('height', $pokemon->height) }}" placeholder="Enter height">
        </div>

        <div class="form-group">
            <label for="hp">HP (Health Points):</label>
            <input type="number" name="hp" class="form-control" value="{{ old('hp', $pokemon->hp) }}" placeholder="Enter HP">
        </div>

        <div class="form-group">
            <label for="attack">Attack:</label>
            <input type="number" name="attack" class="form-control" value="{{ old('attack', $pokemon->attack) }}" placeholder="Enter attack points">
        </div>

        <div class="form-group">
            <label for="defense">Defense:</label>
            <input type="number" name="defense" class="form-control" value="{{ old('defense', $pokemon->defense) }}" placeholder="Enter defense points">
        </div>

        <div class="form-group">
            <label for="is_legendary">Is Legendary:</label>
            <input type="checkbox" name="is_legendary" value="1" {{ old('is_legendary', $pokemon->is_legendary) ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="photo">Photo:</label>
            @if ($pokemon->photo)
                <img src="{{ asset('storage/'.$pokemon->photo) }}" alt="{{ $pokemon->name }}" class="img-thumbnail" width="200">
            @endif
            <input type="file" name="photo" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Update Pokémon</button>
        <a href="{{ route('pokemon.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
