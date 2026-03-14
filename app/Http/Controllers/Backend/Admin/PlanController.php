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
}
