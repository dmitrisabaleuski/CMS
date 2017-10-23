<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{
    public function openPages(){
        $page = (new Page)->select(['id','name','author','content','link']);
        return view('admin-pages')->with(['page'=>$page]);
    }
    public function addPage(){
        $name = "New Page";
        return view('addPage')->with(['name'=>$name]);
    }
    public function savePage(Request $request){
        $this->validate($request,[
            'name'=>'required|max:255',
            'author'=>'required|max:255',
            'contents'=>'required|max:255',
        ]);
        /*$data = $request ->all();*/
        $page = new Page;
        $name = str_replace(' ', '_', $request->name);
        $page->fill([
            'name'=>"$request->name",
            'author'=>"$request->author",
            'content'=>"$request->contents",
            'link'=>"/$name",
        ]);
        $page->save();
        return view('admin');
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
