<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
class IndexController extends Controller
{
    public function  index(){

        $post = (new Post)->select(['id','name','author_name','description'])->orderBy('id', 'desc')->paginate(5);
        return view('page')->with(['post'=>$post]);
    }

}
