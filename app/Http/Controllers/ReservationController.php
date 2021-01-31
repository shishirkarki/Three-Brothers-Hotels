<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class ReservationController extends Controller
{
      public function index_reservation()
    {
        // $Bookings = Booking::all();
        // return view('Reservation',compact('Bookings'));
        // return view('Reservation');
        // $rooms = Room::get()->pluck('room_type', 'id');
        $rooms = Room::all();
        return view('Reservation',compact('rooms'));
      
        
    }
}
