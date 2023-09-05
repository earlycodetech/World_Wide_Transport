@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            <div class="card my-3 bg-white p-3 mx-auto w-75">
                <h5 class="card-header mb-5 text-center fw-bold bg-white"> Book a Ride with Us </h5>
                <form action="{{ route('booking.create') }}" method="post">
                    @csrf
                    <label for="">Trip</label>
                    <select name="trip" class="form-select mb-4">
                        @foreach ($locations as $location)
                            <option value="{{ $location['id'] }}"> 
                                {{ $location['departure'] }}
                                     - 
                                {{ $location['destination'] }} 
                                ₦{{ number_format($location['price'], 2) }} 
                            </option>
                        @endforeach
                    </select>

                    <label for="">Departure Date and Time</label>
                    <input type="datetime-local" name="date" class="form-control mb-3">

                    <label for="">Seats</label>
                    <input type="number" name="seat" class="form-control mb-3" min="1" max="40">

                    <button class="btn btn-primary"> Book Ride </button>
                </form>
            </div>
        </div>
    </section>
@endsection