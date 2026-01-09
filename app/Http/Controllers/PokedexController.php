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
        $this->check($request);
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

        return redirect('/pokedexs')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['pokedex'] = Pokedex::find($id);
        return view('pokedexs.show_index', $data);
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
    // 1. ตรวจสอบความถูกต้อง (image_url เป็น nullable คือไม่ใส่ก็ได้)
    $this->check($request);


    $pokedex = Pokedex::findOrFail($id);
    // 2. อัปเดตข้อมูลทั่วไป
    $pokedex->name = $request->input('name');
    $pokedex->type = $request->input('type');
    $pokedex->species = $request->input('species');
    $pokedex->height = $request->input('height');
    $pokedex->weight = $request->input('weight');
    $pokedex->hp = $request->input('hp');
    $pokedex->attack = $request->input('attack');
    $pokedex->defense = $request->input('defense');

    // 3. จัดการเรื่องรูปภาพ (ถ้าในฟอร์มมีการกรอกมาให้ใช้ค่าใหม่ ถ้าไม่มีให้คงค่าเดิมไว้)
    if ($request->has('image_url')) {
        $pokedex->image_url = $request->input('image_url');
    }

    $pokedex->save();

    return redirect('/pokedexs')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
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

    public function check(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'type' => 'required',
        'species' => 'required',
        'height' => 'required|numeric',
        'weight' => 'required|numeric',
        'hp' => 'required|integer',
        'attack' => 'required|integer',
        'defense' => 'required|integer',
        'image_url' => 'required|url',
    ]);
    }
}
