<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class SaveController extends Controller
{

    public function add(){
        return view('add-content');
    }
    public function save(Request $request){
        $this->validate($request,[
            'name'=>'required|max:255',
            'title'=>'required|max:255',
            'author_name'=>'required|max:255',
            'author_id'=>'required|max:255',
            'content'=>'required|max:255',
            'description'=>'required|max:255',
        ]);
        $data = $request ->all();
        $post = new Post;
        $post->fill($data);
        $post->save();
        return redirect('/');
    }
}
