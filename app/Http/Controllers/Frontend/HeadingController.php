<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Heading;
use Illuminate\Http\Request;

class HeadingController extends Controller
{
    public function AllHeading(){
    $heading = Heading::latest()->get();
    return view('admin.backend.heading.all_heading',compact('heading'));
   }
   //End Method
}
