<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    public function index_room()
    {
        // $roomx = Room::all();
        // return view('rooms',compact('roomx'));
        return view('rooms');
        
    }
}
