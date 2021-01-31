<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index_contact()
    {
        // $Bookings = Booking::all();
        // return view('Reservation',compact('Bookings'));
        return view('Contact');
        // $rooms = Room::get()->pluck('room_type', 'id');
        // $rooms = Room::all();
        // return view('Reservation',compact('rooms'));
      
        
    }
}
