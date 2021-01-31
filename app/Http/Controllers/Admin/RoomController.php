<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $rooms = Room::all();
        return view('admin.room.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->validate($request,[
                'room_type' => 'required',
                'price_time' => 'required',
                'facilities' => 'nullable',
                'image' => 'required|mimes:jpeg,jpg,bmp,png',
            ]);


            $image = $request->file('image');
            $slug = str::slug($request->room_type);
            // $room = Room::find($id);
            if (isset($image))
            {
                $currentDate = Carbon::now()->toDateString();
                $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. 
                $image->getClientOriginalExtension();
                if (!file_exists('uploads/room'))
                {
                    mkdir('uploads/room', 0777 , true);
                }
                $image->move('uploads/room',$imagename);
            }else {
                $imagename = 'dafault.png';
            }
            $room = new Room();
            $room->room_type = $request->room_type;
            $room->price_time = $request->price_time;
            $room->facilities = $request->facilities;
            $room->slug = str_slug($request->room_type);
            $room->image = $imagename;
            $room->save();
            return redirect()->route('room.index')->with('record_added','room Successfully Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::find($id);
        return view('admin.room.edit',compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'room_type' => 'required',
            'price_time' => 'required',
            'facilities' => 'nullable',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);


        $image = $request->file('image');
        $slug = str::slug($request->room_type);
        $room = Room::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. 
            $image->getClientOriginalExtension();
            if (!file_exists('uploads/room'))
            {
                mkdir('uploads/room', 0777 , true);
            }
            $image->move('uploads/room',$imagename);
        }else {
             $imagename = $room->image;
        }

        $room->room_type = $request->room_type;
        $room->price_time = $request->price_time;
        $room->facilities = $request->facilities;
        $room->slug = str_slug($request->room_type);
        $room->image = $imagename;
        $room->save();
        return redirect()->route('room.index')->with('record_updated','room Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);
        if (file_exists('uploads/room/'.$room->image))
        {
            unlink('uploads/room/'.$room->image);
        }
        $room->delete();
        return redirect()->back()->with('record_deleted','room Successfully Deleted');
    }
}
