<?php

namespace App\Http\Controllers\Backend\Client;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class UserController extends Controller
{
     public function UserLogout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
    //End Method 

    public function UserProfile(){
     $id = Auth::user()->id;
     $profileData = User::find($id);
     return view('client.user_profile',compact('profileData'));

  }
   //End Method 

}
