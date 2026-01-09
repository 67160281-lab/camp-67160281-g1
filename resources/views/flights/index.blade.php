@extends('template.default')

@section('content')
    <h1>Flight Create</h1>
    <form action="{{url('/flights')}}" method="post">
        @csrf
        <label for="name">Name:</label>
        <input class="form-control" type="text" name="name" id="name">
        <label for="airline">Airline:</label>
        <input class="form-control" type="text" name="airline" id="airline">
        <label for="number_of_seats">Number of Seats:</label>
        <input class="form-control" type="number" name="number_of_seats" id="number_of_seats">
        <label for="price">Price:</label>
        <input class="form-control" type="text" name="price" id="price">
        <button class="btn btn-primary" type="submit">Create Flight</button>
    </form>
    @include('flights.table')
@endsection
