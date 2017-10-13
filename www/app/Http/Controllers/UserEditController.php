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
            'email'=>'required|max:255',
            'password' => bcrypt($request['password']),
        ]);
        $data = $request ->all();
        $post = (new User)->find($id);
        $post->fill($data);
        $post->update();
        return redirect('admin');
    }

}
