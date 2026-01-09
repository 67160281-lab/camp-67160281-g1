<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['flights'] = Flight::all();
        return view('flights.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $flight = new Flight;
        $flight->name = $request->input('name');
        $flight->airline = $request->input('airline');
        $flight->number_of_seats = $request->input('number_of_seats');
        $flight->price = $request->input('price');
        $flight->save();
        
        return redirect('/flights');
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
        $data['flight_update'] = Flight::find($id);
        $data['flights'] = Flight::all();
        return view('flights.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $flight = Flight::find($id);
        $flight->name = $request->input('name');
        $flight->airline = $request->input('airline');
        $flight->number_of_seats = $request->input('number_of_seats');
        $flight->price = $request->input('price');
        $flight->save();
        
        return redirect('/flights');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $flight = Flight::find($id);
        $flight->delete();
        return redirect('/flights');
    }
}
