<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;
use App\Model\Menu;
class MainPageController extends Controller
{
    public function showMainPage(){
        $post = (new Article)->select([
            'id',
            'name',
            'author_name',
            'description',
        ])->orderBy('id', 'desc')->paginate(5);
        $menu = (new Menu)->select([
            'title',
            'url',
            'active_id',
        ])->get();
        $name = "Main Page";
        return view('mainPage')->with([
            'post'=>$post,
            'name'=>$name,
            'menu'=>$menu,
        ]);
    }
    public function showArticle($id){
        $post = (new Article)->select([
            'id',
            'name',
            'author_name',
            'content'
        ])->where('id',$id)->first();
        $menu = (new Menu)->select([
            'title',
            'url',
            'active_id',
        ])->get();
        $name = $post->name;
        return view('post-content')
            ->with([
                'post'=>$post,
                'name'=>$name,
                'menu'=>$menu,
            ]);
    }
}
