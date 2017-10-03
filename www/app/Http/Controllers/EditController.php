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
            'email'=>'required|max:255',
        ]);
        $data = $request ->all();
        $post = (new User)->find($id);
        $post->fill($data);
        $post->update();
        return redirect('admin');
    }
}
