@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pokémon List</h1>
    
    <!-- Check if there are any Pokémon to display -->
    @if($pokemon->isEmpty())
        <p>No Pokemon found.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Species</th>
                    <th>Primary Type</th>
                    <th>Weight</th>
                    <th>Height</th>
                    <th>HP</th>
                    <th>Attack</th>
                    <th>Defense</th>
                    <th>Legendary</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pokemon as $pokemon)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pokemon->name }}</td>
                    <td>{{ $pokemon->species }}</td>
                    <td>{{ $pokemon->primary_type }}</td>
                    <td>{{ $pokemon->weight }}</td>
                    <td>{{ $pokemon->height }}</td>
                    <td>{{ $pokemon->hp }}</td>
                    <td>{{ $pokemon->attack }}</td>
                    <td>{{ $pokemon->defense }}</td>
                    <td>{{ $pokemon->is_legendary ? 'Yes' : 'No' }}</td>
                    <td>
                        @if($pokemon->photo)
                            <img src="{{ asset('storage/' . $pokemon->photo) }}" alt="{{ $pokemon->name }}" width="100">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('pokemon.show', $pokemon->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('pokemon.edit', $pokemon->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pokemon.destroy', $pokemon->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    <!-- Link to create a new Pokémon -->
    <a href="{{ route('pokemon.create') }}" class="btn btn-primary">Add New Pokémon</a>
</div>
@endsection
