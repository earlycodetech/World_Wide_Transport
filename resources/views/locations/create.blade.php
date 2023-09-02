@extends('layouts.app')
@section('content')
    <section>
        <div class="container my-5">
            <div class="card mx-auto w-75 bg-white">
                <div class="card-header bg-white">
                    Add a New Location
                </div>
                <div class="card-body">
                    <form action="{{ route('locations.store') }}" method="post">
                        @csrf
                        <label for="" class="form-label">Departure Location</label>
                        <input type="text" name="departure" class="form-control mb-3">

                        @error('departure')
                            <span class="fw-bold text-danger d-block text-end"> {{ $message }} </span>
                        @enderror

                        <label for="" class="form-label">Destination Location</label>
                        <input type="text" name="destination" class="form-control mb-3">

                        <label for="" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control mb-3">

                        <label for="" class="form-label">Passengers</label>
                        <input type="number" name="passengers" min="10" max="40" class="form-control mb-3">

                        <button class="btn btn-primary"> Save </button>
           
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection