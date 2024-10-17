<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all Pokemon records
        $pokemons = Pokemon::all();
        return response()->json($pokemons);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|max:50',
            'weight' => 'numeric|digits_between:1,8',
            'height' => 'numeric|digits_between:1,8',
            'hp' => 'integer|digits_between:1,4',
            'attack' => 'integer|digits_between:1,4',
            'defense' => 'integer|digits_between:1,4',
            'is_legendary' => 'boolean',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);

        // Create new Pokemon entry
        $pokemon = Pokemon::create($validated);

        return response()->json($pokemon, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find Pokemon by id
        $pokemon = Pokemon::findOrFail($id);
        return view('pokemon.show', compact('pokemon'));
    }
    public function edit($id)
{
    $pokemon = Pokemon::findOrFail($id);
    return view('pokemon.edit', compact('pokemon'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'string|max:255',
            'species' => 'string|max:100',
            'primary_type' => 'string|max:50',
            'weight' => 'numeric|digits_between:1,8',
            'height' => 'numeric|digits_between:1,8',
            'hp' => 'integer|digits_between:1,4',
            'attack' => 'integer|digits_between:1,4',
            'defense' => 'integer|digits_between:1,4',
            'is_legendary' => 'boolean',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);

        // Find Pokemon by id and update
        $pokemon = Pokemon::findOrFail($id);
        $pokemon->update($validated);

        return response()->json($pokemon);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find Pokemon by id and delete
        $pokemon = Pokemon::findOrFail($id);
        $pokemon->delete();

        return response()->json(null, 204);
    }
}
