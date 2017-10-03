<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserEditController extends Controller
{
    public function edit($id){
        $user = (new User)->select(['name','email'])->where('id',$id)->first();
        return view('user-update')->with(['user'=>$user]);
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
