@extends('layout.template')

@section('title','Pokémon List')

@section('body')
<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>All Pokémon</h1>

    <a href="{{ route('pokemons.create') }}" class="btn btn-primary btn-sm">
        Add New Pokémon
    </a>
</div>

@if(session()->has('success'))
<div class="alert alert-success mt-4">
    {{ session()->get('success') }}
</div>
@endif

<div class="container mt-5">
    <table class="table table-bordered mb-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Species</th>
                <th scope="col">Primary Type</th>
                <th scope="col">HP</th>
                <th scope="col">Attack</th>
                <th scope="col">Defense</th>
                <th scope="col">Legendary</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pokemons as $pokemon)
            <tr>
                <th scope="row">{{ $pokemon->id }}</th>
                <td>
                    <a href="{{ route('pokemons.show', $pokemon) }}">
                        {{ $pokemon->name }}
                    </a>
                </td>
                <td>{{ $pokemon->species }}</td>
                <td>{{ $pokemon->primary_type }}</td>
                <td>{{ $pokemon->hp }}</td>
                <td>{{ $pokemon->attack }}</td>
                <td>{{ $pokemon->defense }}</td>
                <td>{{ $pokemon->is_legendary ? 'Yes' : 'No' }}</td>
                <td>{{ $pokemon->created_at }}</td>
                <td>{{ $pokemon->updated_at }}</td>
                <td>
                    <a href="{{ route('pokemons.edit', $pokemon) }}" class="btn btn-primary btn-sm">
                        Edit
                    </a>
                    <form action="{{ route('pokemons.destroy', $pokemon) }}" method="POST" class="d-inline-block">
                        @method('DELETE')
                        @csrf

                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                            DELETE
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="11">No Pokémon found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $pokemons->links() !!}
    </div>
</div>

@endsection
