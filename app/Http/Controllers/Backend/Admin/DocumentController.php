<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneratedContent;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function AdminDocument(){
        // $id = Auth::user()->id;
        $document = GeneratedContent::orderBy('id','desc')->get();
        return view('admin.backend.document.all_document',compact('document'));
    }
    /// End Method 
}
