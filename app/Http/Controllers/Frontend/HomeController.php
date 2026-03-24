<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
     public function HomeSlider(){
        $slider = Slider::find(1);
        return view('admin.backend.slider.get_slider',compact('slider'));
    }
    //End Method 
}
