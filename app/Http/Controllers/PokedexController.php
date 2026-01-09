<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokedex;
class PokedexController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pokedexs'] = Pokedex::all();
        return view('pokedexs.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pokedex = new Pokedex;
        $pokedex->name = $request->input('name');
        $pokedex->type = $request->input('type');
        $pokedex->species = $request->input('species');
        $pokedex->height = $request->input('height');
        $pokedex->weight = $request->input('weight');
        $pokedex->hp = $request->input('hp');
        $pokedex->attack = $request->input('attack');
        $pokedex->defense = $request->input('defense');
        $pokedex->image_url = $request->input('image_url');

        $pokedex->save();
        
        return redirect('/pokedexs');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['pokedex_update'] = Pokedex::find($id);
        $data['pokedexs'] = Pokedex::all();
        return view('pokedexs.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $pokedex = Pokedex::findOrFail($id);

    $pokedex->name = $request->input('name');
    $pokedex->type = $request->input('type');
    $pokedex->species = $request->input('species');
    $pokedex->height = $request->input('height');
    $pokedex->weight = $request->input('weight');
    $pokedex->hp = $request->input('hp');
    $pokedex->attack = $request->input('attack');
    $pokedex->defense = $request->input('defense');

    // 👇 สำคัญ
    if ($request->filled('image_url')) {
        $pokedex->image_url = $request->input('image_url');
    }

    $pokedex->save();   

    return redirect('/pokedexs');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pokedex = Pokedex::find($id);
        $pokedex->delete();
        return redirect('/pokedexs');
    }
}
