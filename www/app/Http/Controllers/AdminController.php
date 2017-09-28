<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class AdminController extends Controller
{
    public function admin(){
        $post = (new Post)->select(['id','name','author','description','content'])->get();
        return view('admin')->with(['post'=>$post]);
    }
}
