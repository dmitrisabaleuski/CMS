<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class IndexController extends Controller
{
    public function  index(){

        $post = (new Post)->select(['id','name','author','description'])->paginate(5);
        return view('page')->with(['post'=>$post]);
}

}
