<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Role;
use DB;
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
                'author',
                'description',
                'content'])->paginate(10);
        return view('admin-content')->with(['post'=>$post]);
    }
    public function users(){
        $user = (new User)
            ->select([
                'id',
                'name',
                'email'])->paginate(10);
        return view('admin-user')->with(['user'=>$user]);
    }
}
