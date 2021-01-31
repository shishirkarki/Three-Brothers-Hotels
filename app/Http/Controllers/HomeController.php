<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Room;
use App\Models\Photo;
use App\Models\Item;
use App\Models\Category;
use App\Models\Welcome;
use Illuminate\Support\Str;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::all();
        $roomx = Room::all();
        $photos = Photo::all();
        $items = Item::all();
        $categories = Category::all();
        $welcomes = Welcome::all();
        return view('welcome',compact('sliders','roomx','photos','items','categories','welcomes'));
        
    }
}
