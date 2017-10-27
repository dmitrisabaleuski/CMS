<?php

namespace App\Http\Controllers;
use Storage;
use Illuminate\Http\Request;

class MultimediaController extends Controller
{
    public function addMultimedia(Request $request){
        $request->file('image')->store('files/all-multimedia');
        return redirect("admin-multimedia");
    }
    public function deleteMultimedia($file){
       /* Storage::delete($file);
        return redirect("admin-multimedia");
        */
    }
}
