<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{
    public function openPages(){
        $page = (new Page)->select(['id','name','author','description']);
        return view('admin-pages')->with(['page'=>$page]);
    }
    public function about(){
        $page = (new Page)->select(['id','name','author','description']);
        $name = "About";
        return view('content-page')->with(['page'=>$page,'name'=>$name]);
    }
    public function contact(){
        $page = (new Page)->select(['id','name','author','description']);
        $name = "Contact";
        return view('content-page')->with(['page'=>$page,'name'=>$name]);
    }
}
