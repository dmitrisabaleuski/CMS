<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class EditController extends Controller
{
    protected $header;
    protected $footer;
    public function __construct(){
        $this->header = 'Header!!!';
        $this->admin = 'admin';
        $this->admin_name = 'Admin Panel';
        $this->footer = 'Footer!!!';
    }
    public function edit($id){
        $post = Post::select(['id','name','author','content','title'])->where('id',$id)->first();
        return view('post-update')->with(['post'=>$post,'header'=>$this->header,'footer'=>$this->footer, 'admin'=>$this->admin,'admin_name'=>$this->admin_name]);
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'name'=>'required|max:255',
            'title'=>'required|max:255',
            'author'=>'required|max:255',
            'content'=>'required|max:255',
        ]);
        $data = $request ->all();
        $post = Post::find($id);
        $post->fill($data);
        $post->update();
        return redirect('/');
    }
}
