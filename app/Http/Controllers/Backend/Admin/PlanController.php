<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function AllPlans() {
        $plans = Plan::latest()->get();

        return view('admin.backend.plan.all_plan' , compact('plans'));
    }

    //end method 

    public function AddPlans() {
        return view('admin.backend.plan.add_plan');
    }
    //end method 

     public function StorePlans(Request $request){
       
        Plan::create([
            'name' => $request->name,
            'monthly_word_limit' => $request->monthly_word_limit,
            'price' => $request->price,
            'templates' => $request->templates,
        ]);

        $notification = array(
        'message' => 'Plans Added Successfully',
        'alert-type' => 'success'
     );

     return redirect()->route('all.plans')->with($notification);

    }
    // End Method 

    public function EditPlans($id) {
        $plans = Plan::findOr($id);

        return view('admin.backend.plan.edit_plan' , compact('plans'));
    }

    //end method 

     public function UpdatePlans(Request $request){

        $plan_id = $request->id;
       
        Plan::findOrFail($plan_id)->update([
            'name' => $request->name,
            'monthly_word_limit' => $request->monthly_word_limit,
            'price' => $request->price,
            'templates' => $request->templates,
        ]);

        $notification = array(
        'message' => 'Plans Updated Successfully',
        'alert-type' => 'success'
     );

     return redirect()->route('all.plans')->with($notification);

    }
    // End Method 



}
