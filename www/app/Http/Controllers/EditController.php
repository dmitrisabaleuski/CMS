<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class EditController extends Controller
{
    public function edit($id){
        $post = (new Post)->select(['id','name','author','content','title','description'])->where('id',$id)->first();
        return view('post-update')->with(['post'=>$post]);
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'name'=>'required|max:255',
            'title'=>'required|max:255',
            'author'=>'required|max:255',
            'content'=>'required|max:255',
            'description'=>'required|max:50',
        ]);
        $data = $request ->all();
        $post = (new Post)->find($id);
        $post->fill($data);
        $post->update();
        return redirect('/');
    }
}
