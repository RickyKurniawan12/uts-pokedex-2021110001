@extends('layouts.app')

@section('title','Register New Pokemon')

@section('content')

<div class="'mt-4 p-5 bg-black text-white rounded">
    <h1>Register New Pokemon</h1>
</div>
<div class="row my-5">
    <div class="col-12 px-5">
        @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <form action={{route('pokemon.store')}} method="POST" enctype="multipart/form-data">
            @csrf
            
           
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="species">Species:</label>
            <input type="text" name="species" class="form-control" value="{{ old('species') }}" required>
        </div>

        <div class="form-group">
            <label for="primary_type">Primary Type:</label>
            <input type="text" name="primary_type" class="form-control" value="{{ old('primary_type') }}" required>
        </div>

        <div class="form-group">
            <label for="weight">Weight:</label>
            <input type="number" step="0.01" name="weight" class="form-control" value="{{ old('weight') }}">
        </div>

        <div class="form-group">
            <label for="height">Height:</label>
            <input type="number" step="0.01" name="height" class="form-control" value="{{ old('height') }}">
        </div>

        <div class="form-group">
            <label for="hp">HP (Health Points):</label>
            <input type="number" name="hp" class="form-control" value="{{ old('hp') }}">
        </div>

        <div class="form-group">
            <label for="attack">Attack:</label>
            <input type="number" name="attack" class="form-control" value="{{ old('attack') }}">
        </div>

        <div class="form-group">
            <label for="defense">Defense:</label>
            <input type="number" name="defense" class="form-control" value="{{ old('defense') }}">
        </div>

        <div class="form-group">
            <label for="is_legendary">Is Legendary:</label>
            <input type="checkbox" name="is_legendary" value="1" {{ old('is_legendary') ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="file" name="photo" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Create Pokemon</button>
            
            <button type="submit" class="btn btn-primary btn-block">save</button>
        </form>
    </div>
</div>
@endsection
