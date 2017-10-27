<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;
class ArticleController extends Controller
{
    public function articleAdd(){
        $name = "Новая статья";
        return view('addArticle')->with(['name'=>$name]);
    }
    public function articleSave(Request $request){
        $name = "Список статей";
        $this->validate($request,[
            'name'=>'required|max:255',
            'title'=>'required|max:255',
            'author_name'=>'required|max:255',
            'author_id'=>'required|max:255',
            'content'=>'required|max:255',
            'description'=>'required|max:255',
        ]);
        $data = $request ->all();
        $post = new Article;
        $post->fill($data);
        $post->save();
        return redirect('admin-articles')->with(['name'=>$name]);
    }
    public function articleEdit($id){
        $name = "Редактирование статьи";
        $post = (new Article)->select([
            'id',
            'name',
            'author_name',
            'content',
            'title',
            'description',
        ])->where('id',$id)->first();
        return view('article-update')->with([
            'post'=>$post,
            'name'=>$name,
        ]);
    }
    public function articleUpdate(Request $request,$id){
        $name = "Список статей";
        $this->validate($request,[
            'name'=>'required|max:255',
            'title'=>'required|max:255',
            'author_name'=>'required|max:255',
            'content'=>'required|max:255',
            'description'=>'required|max:50',
        ]);
        $data = ($request) ->all();
        $post = (new Article)->find($id);
        $post->fill($data);
        $post->update();
        return redirect('admin-articles')->with(['name'=>$name]);
    }
}
