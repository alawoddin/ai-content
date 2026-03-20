<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\billingHistory;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function AllOrder(){
      $allData = billingHistory::orderBy('id','desc')->get();
      return view('admin.backend.order.all_order',compact('allData'));
   }
     //End Method
}
