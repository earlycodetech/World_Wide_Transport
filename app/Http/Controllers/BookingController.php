<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Locations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function booking_form ()
    {
        $locations = Locations::orderBy('departure', 'asc')->get();
       
        return view('bookings.create', compact('locations'));
    }

    public function book_new_ride(Request $request)
    {
        $request->validate([
            'trip' => "required|numeric|exists:locations,id",
            'date' => "required|after:today|date",
            "seat" => "required|numeric|max:40"
        ]);

        $ticket = "WWT" . rand(100000000,999999999);
        $seats =  $request->input('seat');

        // Get the location using the selected trip
        $location = Locations::findOrFail( $request->input('trip'));

        $price = $location['price'];
        $seats = intval($seats);

        $amount = $price * $seats;
        // dd($amount);
        $booked = Bookings::create([
            'user_id' => Auth::user()->id,
            'location_id' => $request->input('trip'),
            'ticket_no' => $ticket,
            'seats' =>  $request->input('seat'),
            'amount' => $amount,
            'departure_date' => $request->input('date'),
        ]);

        return back()->with('success', "Your Trip with ticket number $ticket has been booked");
    }


    // User Bookings
    public function user_bookings ()
    {
        
        return view('bookings.user-bookings');
    }
}
