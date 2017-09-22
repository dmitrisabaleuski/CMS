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
        $this->footer = 'Footer!!!';
    }
    public function  index(){

        $post = Post::select(['id','name','author','content'])->get();
        return view('page')->with(['post'=>$post,'header'=>$this->header,'footer'=>$this->footer]);
}
    public function show($id){
        $post = Post::select(['id','name','author','content'])->where('id',$id)->first();
        return view('post-content')->with(['post'=>$post,'header'=>$this->header,'footer'=>$this->footer]);
    }
    public function add(){
        return view('add-content')->with(['header'=>$this->header,'footer'=>$this->footer]);
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

    public function edit($id){
        $post = Post::select(['id','name','author','content','title'])->where('id',$id)->first();
        return view('post-update')->with(['post'=>$post,'header'=>$this->header,'footer'=>$this->footer]);
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
