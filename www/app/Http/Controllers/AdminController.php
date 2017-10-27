<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Page;
use App\Model\Article;
use App\Model\User;
use App\Model\Role;
use App\Model\File as FilesTable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function admin()
    {
        $name = "Панель Администратора";
        return view('admin')->with(['name'=>$name]);
    }

    public function viewPages(){
        $name = "Список страниц";
        $page = (new Page)->select([
            'id',
            'name',
            'author',
            'content',
            'link',
        ]);
        return view('admin-pages')->with([
            'page'=>$page,
            'name'=>$name,
        ]);
    }
    public function viewArticles()
    {
        $name = "Список статей";
        $post = (new Article)
            ->select([
                'id',
                'name',
                'author_name',
                'description',
                'content'
            ])->orderBy('id', 'desc')->paginate(10);
        return view('admin-articles')->with(['post' => $post,'name'=>$name]);
    }

    public function viewUsers()
    {
        $name = "Список пользователей";
        $user = (new User)
            ->select([
                'id',
                'name',
                'email'])->orderBy('id', 'desc')->paginate(10);
        return view('admin-user')->with([
            'user'=>$user,
            'name'=>$name,
            ]);
    }
    public function viewMultimedia(){
        $name = "Мультимедиа";
        $files = Storage::allFiles('files/all-multimedia');
        return view('admin-multimedia')->with([
            'files'=>$files,
            'name'=>$name,
            ]);
    }
    public function viewFiles(){
        $name = "Файлы";
        $files = (new FilesTable)->select([
            'id',
            'name',
            'mimetype',
            'link',
        ])->get();
        return view('admin-files')
            ->with([
                'files'=>$files,
                'name'=>$name,
                ]);
    }
}
