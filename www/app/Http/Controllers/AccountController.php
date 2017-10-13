<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
class AccountController extends Controller
{
    public function account($id){
        $user = (new User)->select(['id','name','email','avatar'])->where('id',$id)->get();
        $post = (new Post)->select(['id','name','author_name','description','date','content'])->where('author_id',$id)->orderBy('id', 'desc')->paginate(5);
        return view('account')->with(['user'=>$user,'post'=>$post]);
    }
    public function accedit($id){
        $user = (new User)->select(['id','name','email'])->where('id',$id)->first();
        return view('accountEdit')->with(['user'=>$user]);
    }
    public function accupdate(Request $request,$id){
        $this->validate($request,[
            'name'=>'required|max:255',
            'email'=>'required|max:255',

        ]);
        $request['password'] = bcrypt($request['password']);
        $data = $request ->all();
        $post = (new User)->find($id);
        $post->fill($data);
        $post->update();
        return redirect("admin/user-$id");
    }
}
