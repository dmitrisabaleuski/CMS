<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
class AdminController extends Controller
{
    public function admin(){
        $post = (new Post)->select(['id','name','author','description','content'])->paginate(10);
        $user = (new User)->select(['id','name','email'])->paginate(10);
        return view('admin')->with(['post'=>$post,'user'=>$user]);
    }
}
