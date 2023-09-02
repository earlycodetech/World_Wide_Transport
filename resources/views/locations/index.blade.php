@extends('layouts.app')
@section('content')
    <section>
        <div class="container my-5">
            <div class="card bg-white border-0 shadow">
                <div class="card-header bg-white">
                    All Locations
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <th scope="row"> Departure </th>
                                <th scope="row"> Destination </th>
                                <th scope="row"> Price </th>
                                <th scope="row"> N<sub>o</sub> Passengers </th>
                                <th>
                                    ...
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($locations as $loc)
                                <tr>
                                    <td> {{ $loc['departure'] }} </td>
                                    <td> {{ $loc['destination'] }} </td>
                                    <td> &#8358; {{ number_format($loc['price'],2) }} </td>
                                    <td> {{ $loc['passengers'] }} </td>
                                    <td class="d-flex gap-2">
                                        <a href="{{ route('locations.edit', ['location'=> $loc->id]) }}" class="btn btn-primary"> Edit </a>

                                        <form 
                                            onsubmit="return confirm('Are you sure?')"
                                            action="{{ route('locations.destroy', ['location'=> $loc['id']]) }}" 
                                            method="post">

                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger"> Delete </button>
                                        </form>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="5" class="p-4 fs-2 text-center text-danger">
                                        No Location Found 
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>


                    <div class="p-3">
                        {!! $locations->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
