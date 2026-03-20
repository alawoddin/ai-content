<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatAssistant;
use Illuminate\Support\Facades\Auth;
use App\Models\ChatConversation; 
use OpenAI\Laravel\Facades\OpenAI;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
     public function AllAssistants(){
        $assistant = ChatAssistant::latest()->get();
        return view('admin.backend.assistant.all_assistant',compact('assistant'));
    }
    // End Method 

     public function AddAssistants(){
     return view('admin.backend.assistant.add_assistant');
    }
    // End Method 

    
}
