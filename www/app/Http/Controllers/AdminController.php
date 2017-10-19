<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function admin(){
        return view('admin');
    }
    public function content(){
        $post = (new Post)
            ->select([
                'id',
                'name',
                'author_name',
                'description',
                'content'])->orderBy('id', 'desc')->paginate(10);
        return view('admin-content')->with(['post'=>$post]);
    }
    public function users(){
        $user = (new User)
            ->select([
                'id',
                'name',
                'email'])->orderBy('id', 'desc')->paginate(10);

        return view('admin-user')->with(['user'=>$user]);
    }
    public function multimedia(){
        $files = Storage::allFiles('files/all-multimedia');
        return view('admin-multimedia')->with(['files'=>$files]);
    }
    public function addMultimedia(Request $request){
        $request->file('image')->store('files/all-multimedia');
        return redirect("admin-multimedia");
    }
    public function deleteIMG($file){
        Storage::delete($file);
        return redirect("admin-multimedia");
    }
}
