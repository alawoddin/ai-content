<?php

namespace App\Http\Controllers\Backend\Client;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTemplateController extends Controller
{
     public function UserTemplate(){
        $user = Auth::user();
        $userPlan = $user->plan;
        $templateLimit = $userPlan ? $userPlan->templates : 3;
        
        $templates = Template::latest()->take($templateLimit)->get();
        return view('client.backend.template.all_template',compact('user','templates'));
    }
    // End Method 
}
