<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class SaveController extends Controller
{
    protected $header;
    protected $footer;
    public function __construct(){
        $this->header = 'Header!!!';
        $this->admin = 'admin';
        $this->admin_name = 'Admin Panel';
        $this->footer = 'Footer!!!';
    }
    public function add(){
        return view('add-content')->with(['header'=>$this->header,'footer'=>$this->footer,'admin'=>$this->admin,'admin_name'=>$this->admin_name]);
    }
    public function save(Request $request){
        $this->validate($request,[
            'name'=>'required|max:255',
            'title'=>'required|max:255',
            'author'=>'required|max:255',
            'content'=>'required|max:255',
        ]);
        $data = $request ->all();
        $post = new Post;
        $post->fill($data);
        $post->save();
        return redirect('/');
    }
}
