@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            <div class="card my-3 bg-white p-3 mx-auto w-75">
                <h5 class="card-header mb-5 text-center fw-bold bg-white"> Book a Ride with Us </h5>
                <form action="" method="post">
                    <label for="">Trip</label>
                    <select name="" class="form-select mb-4">
                        <option value=""> Lagos - Abuja ₦5000 </option>
                        <option value=""> Lagos - Ibadan  ₦5000 </option>
                    </select>

                    <label for="">Departure Date and Time</label>
                    <input type="datetime-local" class="form-control mb-3">

                    <label for="">Seats</label>
                    <input type="number" class="form-control mb-3" min="1" max="40">

                    <button class="btn btn-primary"> Book Ride </button>
                </form>
            </div>
        </div>
    </section>
@endsection