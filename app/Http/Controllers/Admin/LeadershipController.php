<?php

namespace App\Http\Controllers\Admin;

use App\Models\Leadership;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LeadershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $leaderships = Leadership::all();
        return view('admin.leadership.index',compact('leaderships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.leadership.create');
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
                'name' => 'required',
                'post' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:jpeg,jpg,bmp,png',
            ]);


            $image = $request->file('image');
            $slug = str::slug($request->name);
            // $leadership = leadership::find($id);
            if (isset($image))
            {
                $currentDate = Carbon::now()->toDateString();
                $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. 
                $image->getClientOriginalExtension();
                if (!file_exists('uploads/leadership'))
                {
                    mkdir('uploads/leadership', 0777 , true);
                }
                $image->move('uploads/leadership',$imagename);
            }else {
                $imagename = 'dafault.png';
            }
            $leadership = new Leadership();
            $leadership->name = $request->name;
            $leadership->post = $request->post;
            $leadership->description = $request->description;
            $leadership->image = $imagename;
            $leadership->save();
            return redirect()->route('leadership.index')->with('record_added','leadership Successfully Saved');
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
        $leadership = Leadership::find($id);
        return view('admin.leadership.edit',compact('leadership'));
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
            'name' => 'required',
            'post' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);


        $image = $request->file('image');
        $slug = str::slug($request->leadership_type);
        $leadership = Leadership::find($id);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. 
            $image->getClientOriginalExtension();
            if (!file_exists('uploads/leadership'))
            {
                mkdir('uploads/leadership', 0777 , true);
            }
            $image->move('uploads/leadership',$imagename);
        }else {
             $imagename = $leadership->image;
        }

        $leadership->name = $request->name;
        $leadership->post = $request->post;
        $leadership->description = $request->description;
        $leadership->image = $imagename;
        $leadership->save();
        return redirect()->route('leadership.index')->with('record_updated','leadership Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leadership = Leadership::find($id);
        if (file_exists('uploads/leadership/'.$leadership->image))
        {
            unlink('uploads/leadership/'.$leadership->image);
        }
        $leadership->delete();
        return redirect()->back()->with('record_deleted','leadership Successfully Deleted');
    }
}
