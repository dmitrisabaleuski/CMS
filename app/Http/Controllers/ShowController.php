<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class ShowController extends Controller
{
    protected $header;
    protected $footer;
    public function __construct(){
        $this->header = 'Header!!!';
        $this->admin = 'admin';
        $this->admin_name = 'Admin Panel';
        $this->footer = 'Footer!!!';
    }
    public function show($id){
        $post = Post::select(['id','name','author','content'])->where('id',$id)->first();
        return view('post-content')->with(['post'=>$post,'header'=>$this->header,'footer'=>$this->footer,'admin'=>$this->admin,'admin_name'=>$this->admin_name]);
    }
}
