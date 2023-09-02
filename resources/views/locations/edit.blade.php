@extends('layouts.app')
@section('content')
    <section>
        <div class="container my-5">
            <div class="card mx-auto w-75 bg-white">
                <div class="card-header bg-white">
                    Edit: {{ $location['departure'] }} - {{ $location['destination'] }}
                </div>
                <div class="card-body">
                    <form action="{{ route('locations.update', [ 'location'=> $location['id'] ]) }}" method="post">
                        @csrf 
                        @method('PUT')
                        
                        <label for="" class="form-label">Departure Location</label>
                        <input type="text" name="departure" value="{{ $location['departure'] }}" class="form-control mb-3">

                        @error('departure')
                            <span class="fw-bold text-danger d-block text-end"> {{ $message }} </span>
                        @enderror

                        <label for="" class="form-label">Destination Location</label>
                        <input type="text" name="destination" value="{{ $location['destination'] }}" class="form-control mb-3">

                        <label for="" class="form-label">Price</label>
                        <input type="number" name="price" value="{{ $location['price'] }}" class="form-control mb-3">

                        <label for="" class="form-label">Passengers</label>
                        <input type="number" name="passengers" value="{{ $location['passengers'] }}" min="10" max="40" class="form-control mb-3">

                        <button class="btn btn-primary"> Edit </button>
           
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection