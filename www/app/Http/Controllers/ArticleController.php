<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;
use App\Model\Page;

class ArticleController extends Controller
{
    public function articleAdd()
    {
        $name = "Новая статья";
        $page = (new Page)->select([
            'id',
            'name',
        ])->get();
        return view('addArticle')->with([
            'name' => $name,
            'page' => $page,
            ]);
    }

    public function articleSave(Request $request)
    {
        $name = "Список статей";
        $this->validate($request, [
            'name' => 'required|max:255',
            'title' => 'required|max:255',
            'author_name' => 'required|max:255',
            'author_id' => 'required|max:255',
            'content' => 'required|max:255',
            'description' => 'required|max:255',
        ]);
        $post = new Article;
        if ($request->viewmenu == true) {
            $var = 1;
            $post->fill([
                'name' => "$request->name",
                'title' => "$request->title",
                'author_name' => "$request->author_name",
                'author_id' => "$request->author_id",
                'content' => "$request->content",
                'description' => "$request->description",
                'view_on_main' => "$var",
            ]);
            $post->update();
            return redirect('admin-articles')->with(['name' => $name]);
        } else {
            $var = 0;
            $post->fill([
                'name' => "$request->name",
                'title' => "$request->title",
                'author_name' => "$request->author_name",
                'author_id' => "$request->author_id",
                'content' => "$request->content",
                'description' => "$request->description",
                'view_on_main' => "$var",
            ]);
            $post->update();
            return redirect('admin-articles')->with(['name' => $name]);
        }
    }

    public function articleEdit($id)
    {
        $name = "Редактирование статьи";
        $post = (new Article)->select([
            'id',
            'name',
            'author_name',
            'content',
            'title',
            'description',
            'view_on_main',
        ])->where('id', $id)->first();
        $page = (new Page)->select([
            'id',
            'name',
        ])->get();
        return view('article-update')->with([
            'post' => $post,
            'page' => $page,
            'name' => $name,
        ]);
    }

    public function articleUpdate(Request $request, $id)
    {
        $name = "Список статей";
        $this->validate($request, [
            'name' => 'required|max:255',
            'title' => 'required|max:255',
            'author_name' => 'required|max:255',
            'content' => 'required|max:255',
            'description' => 'required|max:50',
        ]);
        $post = (new Article)->find($id);
        if ($request->viewmenu == true) {
            $post->fill([
                'name' => "$request->name",
                'title' => "$request->title",
                'author_name' => "$request->author_name",
                'content' => "$request->content",
                'description' => "$request->description",
                'view_on_main' => '1',
                'parent_page'=>"$request->hero",
            ]);
            $post->update();
            return redirect('admin-articles')->with(['name' => $name]);
        } else {
            $post->fill([
                'name' => "$request->name",
                'title' => "$request->title",
                'author_name' => "$request->author_name",
                'content' => "$request->content",
                'description' => "$request->description",
                'view_on_main' => '0',
                'parent_page'=>"$request->hero",
            ]);
            $post->update();
            return redirect('admin-articles')->with(['name' => $name]);
        }
    }
}
