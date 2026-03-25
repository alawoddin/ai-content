<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Questions;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function AllQuestions(){
    $question = Questions::latest()->get();
    return view('admin.backend.question.all_question',compact('question'));
   }
   //End Method 

   public function AddQuestions(){
   
    return view('admin.backend.question.add_question');
   }
   //End Method 

   public function StoreQuestions(Request $request){
        Questions::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

    $notification = array(
        'message' => 'Questions Inserted Successfully',
        'alert-type' => 'success'
     ); 
     return redirect()->route('all.questions')->with($notification); 

   }
   //End Method 
}
