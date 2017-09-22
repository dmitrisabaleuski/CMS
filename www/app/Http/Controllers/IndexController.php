<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class IndexController extends Controller
{
    protected $header;
    protected $footer;
    public function __construct(){
        $this->header = 'Header!!!';
        $this->admin = 'admin';
        $this->admin_name = 'Admin Panel';
        $this->footer = 'Footer!!!';
    }
    public function  index(){

        $post = Post::select(['id','name','author','content'])->get();
        return view('page')->with(['post'=>$post,'header'=>$this->header,'footer'=>$this->footer,'admin'=>$this->admin,'admin_name'=>$this->admin_name]);
}

}
