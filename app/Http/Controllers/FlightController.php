<?php

namespace App\Http\Controllers;

use App\Models\Flight;
//use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['flight'] = Flight::all();
        return view('flights.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('flights.update');
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
        $data['flight'] = Flight::find($id);
        $data['flight_update'] = ;
        return view('flights.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
