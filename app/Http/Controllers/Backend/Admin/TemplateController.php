<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
     public function AllTemplate(){
        $templates = Template::latest()->get();
        return view('admin.backend.template.all_template',compact('templates'));
    }
    //End Method 
}
