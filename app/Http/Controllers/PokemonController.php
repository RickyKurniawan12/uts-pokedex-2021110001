<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all Pokemon records
        $pokemon = Pokemon::all();
        return view('pokemons.index', compact('pokemon'));
    }
   /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pokemons.create');
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

        if($request->hasFile('avatar')){
            $request->validate([
                'avatar'=> 'image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            ]);
            $imagePath = $request->file('avatar')->storePublicly('public/image');
            $validated['avatar'] = $imagePath;
        }
        
        Pokemon::create([
            'name'=> $validated['name'],
            'species'=> $validated['species'],
            'primary_type'=> $validated['primary_type'],
            'weight'=> $validated['weight'],
            'height'=> $validated['height'],
            'hp'=> $validated['hp'],
            'attack'=> $validated['attack'],
            'defense'=> $validated['defense'],
            'is_legendary'=> $validated['is_legendary'],
            'photo' => $validated['photo']?? null,
           ]);
    
           return redirect()->route('pokemons.index')->with('success','pokemon added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find Pokemon by id
        $pokemon = Pokemon::findOrFail($id);
        return view('pokemons.show', compact('pokemon'));
    }
    public function edit($id)
{
    $pokemon = Pokemon::findOrFail($id);
    return view('pokemons.edit', compact('pokemon'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
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

        if($request->hasFile('photo')){
            $request->validate([
                'photo'=> 'image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            ]);

            $imagePath = $request->file('photo')->storePublicly('public/image');

            // hapus file existing
            if($pokemon->photo){
                Storage::delete($pokemon->photo);
            }

            $validated['photo'] = $imagePath;
        }
        $pokemon->update([
            'name'=> $validated['name'],
            'species'=> $validated['species'],
            'primary_type'=> $validated['primary_type'],
            'weight'=> $validated['weight'],
            'height'=> $validated['height'],
            'hp'=> $validated['hp'],
            'attack'=> $validated['attack'],
            'defense'=> $validated['defense'],
            'is_legendary'=> $validated['is_legendary'],
            'photo'=> $validated['photo']?? $pokemon->photo,]);
        return redirect()->route('pokemons.index')->with('success','pokemon updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pokemon $pokemon)
    {
        if($pokemon->photo){
            Storage::delete($$pokemon->photo);
        }
        $pokemon->delete();
        return redirect()->route('pokemons.index')->with('success','pokemon deleted successfully');
    }
}
