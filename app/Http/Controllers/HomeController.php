<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $guest_name = 'Budi';

        return view('home', compact('pokemon'));
    }
    public function getPokemon($id , $serial_number = -1)
    {
        // if($id <0){
        //     abort(404);
        // }
        return view('pokemon-detail',compact('id','serial_number'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:10'
        ]);


        return $request->name;
    }
}
