<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Photo;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::all();
        return view('admin.photo.index',compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.photo.create');
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
            'photo_description' => 'nullable',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);


        $image = $request->file('image');
        $slug = str::slug($request->name);
        // $slider = Slider::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. 
            $image->getClientOriginalExtension();
            if (!file_exists('uploads/photo'))
            {
                mkdir('uploads/photo', 0777 , true);
            }
            $image->move('uploads/photo',$imagename);
        }else {
            $imagename = 'dafault.png';
        }
        $photo = new Photo();
        $photo->photo_description = $request->photo_description;
        $photo->image = $imagename;
        $photo->save();
        return redirect()->route('photo.index')->with('record_added','photo Successfully Saved');
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
        $photo = Photo::find($id);
        return view('admin.photo.edit',compact('photo'));
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
            'photo_description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);


        $image = $request->file('image');
        $slug = str::slug($request->photo_description);
        $photo = Photo::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. 
            $image->getClientOriginalExtension();
            if (!file_exists('uploads/photo'))
            {
                mkdir('uploads/photo', 0777 , true);
            }
            $image->move('uploads/photo',$imagename);
        }else {
            $imagename = $photo->image;
        }
        $photo->photo_description = $request->photo_description;
        $photo->image = $imagename;
        $photo->save();
        return redirect()->route('photo.index')->with('record_added','photo Successfully Saved');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);
        if (file_exists('uploads/photo/'.$photo->image))
        {
            unlink('uploads/photo/'.$photo->image);
        }
        $photo->delete();
        return redirect()->back()->with('record_deleted','photo Successfully Deleted');
    }
}
