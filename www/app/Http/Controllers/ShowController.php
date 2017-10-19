<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
class ShowController extends Controller
{
    public function show($id){
        $post = (new Post)->select(['id','name','author_name','content'])->where('id',$id)->first();
        return view('post-content')->with(['post'=>$post]);
    }
}
