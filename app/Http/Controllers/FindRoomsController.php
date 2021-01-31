<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class FindRoomsController extends Controller
{
    public function index(Request $request)
    {
        // if (!Gate::allows('find_room_access')) {
        //     return abort(401);
        // }
        $checkin_date = $request->input('checkin_date');
        $checkout_date = $request->input('checkout_date');

        if ($request->isMethod('POST')) {
            $rooms = Room::with('booking')->whereHas('booking', function ($q) use ($checkin_date, $checkout_date) {
                $q->where(function ($q2) use ($checkin_date, $checkout_date) {
                    $q2->where('checkin_date', '>=', $checkout_date)
                       ->orWhere('checkout_date', '<=', $checkin_date);
                });
            })->orWhereDoesntHave('booking')->get();
        } else {
            $rooms = null;
        }
        $roomx = Room::all();
        return view('rooms', compact('rooms', 'roomx', 'checkin_date', 'checkout_date'));
    }
}