<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Welcome;
use App\Models\Leadership;
use App\Models\Photo;
use App\Models\History;



class AboutusController extends Controller
{
    public function index_aboutus()
    {
        $welcomes = Welcome::all();
        $leaderships = Leadership::all();
        $photos = Photo::all();
        $historys = History::all();
       
        return view('Aboutus',compact('welcomes','leaderships','photos','historys'));
      
        
    }
}
