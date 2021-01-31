<?php

namespace App\Http\Controllers\Admin;

use App\Models\Welcome;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $welcomes = Welcome::all();
        return view('admin.welcome.index',compact('welcomes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.welcome.create');
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
                'welcome_title' => 'required',
                'welcome_description' => 'required',
                'video_link' => 'nullable',
                'image' => 'required|mimes:jpeg,jpg,bmp,png',
                'photo' => 'required|mimes:jpeg,jpg,bmp,png',
            ]);


            $image = $request->file('image');
            $slug = str::slug($request->welcome_title);
            // $welcome = welcome::find($id);
            if (isset($image))
            {
                $currentDate = Carbon::now()->toDateString();
                $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. 
                $image->getClientOriginalExtension();
                if (!file_exists('uploads/welcome'))
                {
                    mkdir('uploads/welcome', 0777 , true);
                }
                $image->move('uploads/welcome',$imagename);
            }else {
                $imagename = 'dafault.png';
            }


            $photo = $request->file('photo');
            $slug = str::slug($request->welcome_title);
            // $welcome = welcome::find($id);
            if (isset($photo))
            {
                $currentDate = Carbon::now()->toDateString();
                $photoname = $slug .'-'. $currentDate .'-'. uniqid() .'.'. 
                $photo->getClientOriginalExtension();
                if (!file_exists('uploads/welcome'))
                {
                    mkdir('uploads/welcome', 0777 , true);
                }
                $photo->move('uploads/welcome',$photoname);
            }else {
                $photoname = 'dafault.png';
            }


            $welcome = new Welcome();
            $welcome->welcome_title = $request->welcome_title;
            $welcome->welcome_description = $request->welcome_description;
            $welcome->video_link = $request->video_link;
            
            $welcome->image = $imagename;
            $welcome->photo = $photoname;
            $welcome->save();
            return redirect()->route('welcome.index')->with('record_added','welcome Successfully Saved');
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
        $welcome = Welcome::find($id);
        return view('admin.welcome.edit',compact('welcome'));
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
            'welcome_title' => 'required',
            'welcome_description' => 'required',
            'video_link' => 'nullable',
            'image' => 'mimes:jpeg,jpg,bmp,png',
            'photo' => 'mimes:jpeg,jpg,bmp,png',
        ]);


        $image = $request->file('image');
        $slug = str::slug($request->welcome_title);
        $welcome = Welcome::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. 
            $image->getClientOriginalExtension();
            if (!file_exists('uploads/welcome'))
            {
                mkdir('uploads/welcome', 0777 , true);
            }
            $image->move('uploads/welcome',$imagename);
        }else {
             $imagename = $welcome->image;
        }




        $photo = $request->file('photo');
        $slug = str::slug($request->welcome_title);
        $welcome = Welcome::find($id);
        if (isset($photo))
        {
            $currentDate = Carbon::now()->toDateString();
            $photoname = $slug .'-'. $currentDate .'-'. uniqid() .'.'. 
            $photo->getClientOriginalExtension();
            if (!file_exists('uploads/welcome'))
            {
                mkdir('uploads/welcome', 0777 , true);
            }
            $photo->move('uploads/welcome',$photoname);
        }else {
             $photoname = $welcome->photo;
        }



        $welcome->welcome_title = $request->welcome_title;
        $welcome->welcome_description = $request->welcome_description;
        $welcome->video_link = $request->video_link;
        
        $welcome->image = $imagename;
        $welcome->photo = $photoname;
        $welcome->save();
        return redirect()->route('welcome.index')->with('record_updated','welcome Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $welcome = Welcome::find($id);
        if (file_exists('uploads/welcome/'.$welcome->image))
        {
            unlink('uploads/welcome/'.$welcome->image);
        }
        $welcome->delete();
        return redirect()->back()->with('record_deleted','welcome Successfully Deleted');
    }
}
