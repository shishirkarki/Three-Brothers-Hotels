<?php

namespace App\Http\Controllers\Admin;

use App\Models\History;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $historys = History::all();
        return view('admin.history.index',compact('historys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.history.create');
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
                'year' => 'required',
                'title' => 'required',
                'description' => 'required',
            ]);


            $history = new History();
            $history->year = $request->year;
            $history->title = $request->title;
            $history->description = $request->description;
            $history->save();
            return redirect()->route('history.index')->with('record_added','history Successfully Saved');
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
        $history = History::find($id);
        return view('admin.history.edit',compact('history'));
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
            'year' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);


      
        $history = History::find($id);
        
    
        $history->year = $request->year;
            $history->title = $request->title;
            $history->description = $request->description;
            $history->save();
        return redirect()->route('history.index')->with('record_updated','history Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $history = History::find($id);
        if (file_exists('uploads/history/'.$history->image))
        {
            unlink('uploads/history/'.$history->image);
        }
        $history->delete();
        return redirect()->back()->with('record_deleted','history Successfully Deleted');
    }
}
