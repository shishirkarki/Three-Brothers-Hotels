<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use Session;
use Illuminate\Support\Str;
class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countrys = Country::all();
        return view('admin.country.index',compact('countrys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.country.create');
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
            'shortcode' => 'required',
            'title' => 'required',
            'name' => 'nullable',

        ]);
        $country = new Country();
        $country->shortcode = $request->shortcode;
        $country->title = $request->title;
        $country->name = $request->name;
        $country->save();
        Session::flash('success','Messsage Send successfully!');
        return redirect()->route('country.index')->with('record_added','countrys data Successfully Saved');
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
        $country = country::find($id);
        return view('admin.country.edit',compact('country'));
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
            'shortcode' => 'required',
            'title' => 'required',
            'name' => 'required',

        ]);
        $slug = str::slug($request->name);
        $country = country::find($id);
        $country->shortcode = $request->shortcode;
        $country->title = $request->title;
        $country->name = $request->name;
        $country->save();
        Session::flash('success','Messsage Send successfully!');
        return redirect()->route('country.index')->with('record_updated','countrys data Successfully Saved');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();
        return redirect()->back()->with('record_deleted','country Successfully Deleted');
    }
}
