<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class AdminController extends Controller
{
    protected $header;
    protected $footer;
    public function __construct(){
        $this->header = 'Header!!!';
        $this->admin = '';
        $this->admin_name = 'Back to main page';
        $this->footer = 'Footer!!!';
    }
    public function admin(){
        $post = Post::select(['id','name','author','content'])->get();
        return view('admin')->with(['post'=>$post,'header'=>$this->header,'footer'=>$this->footer,'admin'=>$this->admin,'admin_name'=>$this->admin_name]);
    }
}
