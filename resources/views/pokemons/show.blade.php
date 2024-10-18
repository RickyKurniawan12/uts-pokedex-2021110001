@extends('layouts.template')

@section('title', "Pokemon: $pokemon->name")

@section('body')

@if($pokemon->photo)
    <img src="{{ asset('storage/' . $pokemon->photo) }}" class="rounded img-thumbnail mx-auto d-block my-3" alt="{{ $pokemon->name }}"/>
@endif
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">Name</th>
                <td>{{ $pokemon->name }}</td>
            </tr>
            <tr>
                <th scope="row">Species</th>
                <td>{{ $pokemon->species }}</td>
            </tr>
            <tr>
                <th scope="row">Primary Type</th>
                <td>{{ $pokemon->primary_type }}</td>
            </tr>
            <tr>
                <th scope="row">Weight</th>
                <td>{{ $pokemon->weight }} kg</td>
            </tr>
            <tr>
                <th scope="row">Height</th>
                <td>{{ $pokemon->height }} m</td>
            </tr>
            <tr>
                <th scope="row">HP</th>
                <td>{{ $pokemon->hp }}</td>
            </tr>
            <tr>
                <th scope="row">Attack</th>
                <td>{{ $pokemon->attack }}</td>
            </tr>
            <tr>
                <th scope="row">Defense</th>
                <td>{{ $pokemon->defense }}</td>
            </tr>
            <tr>
                <th scope="row">Legendary</th>
                <td>{{ $pokemon->is_legendary ? 'Yes' : 'No' }}</td>
            </tr>
        </tbody>
    </table>
    <div>
        <small>Created at: {{ $pokemon->created_at }}</small>
        @if($pokemon->updated_at)
        <br><small>Updated at: {{ $pokemon->updated_at }}</small>
        @endif
    </div>
    @endsection
