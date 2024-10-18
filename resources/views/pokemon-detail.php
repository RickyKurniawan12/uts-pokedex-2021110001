@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $pokemon->name }}</h1>
    <img src="{{ asset($pokemon->photo) }}" alt="{{ $pokemon->name }}" />
    <p>ID: {{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</p>
    <p>Species: {{ $pokemon->species }}</p>
    <p>Primary Type: {{ $pokemon->primary_type }}</p>
    <p>Weight: {{ $pokemon->weight }}</p>
    <p>Height: {{ $pokemon->height }}</p>
    <p>HP: {{ $pokemon->hp }}</p>
    <p>Attack: {{ $pokemon->attack }}</p>
    <p>Defense: {{ $pokemon->defense }}</p>
    <p>Is Legendary: {{ $pokemon->is_legendary ? 'Yes' : 'No' }}</p>
    <a href="{{ route('pokemon.index') }}" class="btn btn-primary">Back to Index</a>
</div>
@endsection