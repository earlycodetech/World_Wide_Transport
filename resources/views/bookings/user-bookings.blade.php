@extends('layouts.app')
@section('content')
    <section>
        <div class="container-fluid my-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col"># Ticket</th>
                        <th scope="col">Trip</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Seats</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse (Auth::user()->trips as $trip)
                        <tr>
                            <th scope="row"> {{ $trip['ticket_no'] }} </th>
                            <td>
                                {{ $trip->location['departure'] }}
                                -
                                {{ $trip->location['destination'] }}
                            </td>
                            <td>
                                ₦{{ number_format($trip->location['price'], 2) }}
                            </td>
                            <td> {{ $trip['seats'] }}</td>
                            <td> {{ date('jS M. Y h:i a', strtotime($trip['departure_date'])) }}</td>
                            <td>
                                @if ($trip['status'])
                                    <span class="btn btn-success"></span>
                                @else
                                    <span class="btn btn-danger"> Pending... </span>
                                @endif
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="5" class="text-danger"> No Bookings yet </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </section>
@endsection
