@extends('layouts.app')

@section('title','Pokemon List')

@section('content')
<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>All Pokemon</h1>

    <a href="{{ route('pokemon.create') }}" class="btn btn-primary btn-sm">
        Add New Pokemon
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
            @forelse($pokemon as $poke)
            <tr>
                <th scope="row">{{ $pokemon->id }}</th>
                <td>
                    <a href="{{ route('pokemon.show', $pokemon) }}">
                        {{ $pokemon->name }}
                    </a>
                </td>
                <td>{{ $poke->species }}</td>
                <td>{{ $poke->primary_type }}</td>
                <td>{{ $poke->hp }}</td>
                <td>{{ $poke->attack }}</td>
                <td>{{ $poke->defense }}</td>
                <td>{{ $poke->is_legendary ? 'Yes' : 'No' }}</td>
                <td>{{ $poke->created_at }}</td>
                <td>{{ $poke->updated_at }}</td>
                <td>
                    <a href="{{ route('pokemon.edit', $poke) }}" class="btn btn-primary btn-sm">
                        Edit
                    </a>
                    <form action="{{ route('pokemon.destroy', $poke) }}" method="POST" class="d-inline-block">
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
                <td colspan="11">No Pokemon found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $pokemon->links() !!}
    </div>
</div>

@endsection
