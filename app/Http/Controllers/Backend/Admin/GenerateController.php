<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenerateController extends Controller
{
     public function GenerateImage(){

        return view('admin.backend.generate.generate_image');

    }
    // End Method
}
