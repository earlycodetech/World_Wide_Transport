<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function booking_form ()
    {
        return view('bookings.create');
    }
}
