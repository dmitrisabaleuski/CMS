<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Page;
use App\Model\Menu;
use function Psy\bin;

class PageController extends Controller
{
    public function pageShow($id){
        $page = (new Page)->select([
            'id',
            'name',
            'content',
            'author',
        ])->where('id',$id)->first();
        $name = $page->name;
        $menu = (new Menu)->select([
            'title',
            'url',
            'active_id',
        ])->get();
        return view('content-page')
            ->with([
                'page'=>$page,
                'name'=>$name,
                'menu'=>$menu,
            ]);
    }
    public function addPage(){
        $name = "New Page";
        return view('addPage')->with(['name'=>$name]);
    }
    public function savePage(Request $request){
        $this->validate($request,[
            'name'=>'required|max:255',
            'author'=>'required|max:255',
            'contents'=>'required|max:255',
        ]);
        $name = "Панель Администратора";
        $page = new Page;
        if($request->menu == true){
            $pageName = str_replace(' ', '_', $request->name);
            $page->fill([
                'name'=>"$request->name",
                'author'=>"$request->author",
                'content'=>"$request->contents",
                'link'=>"/$pageName",
                'active_menu'=>1,
            ]);
            $page->save();
            return PageController::savePageInMenu($pageName);
        }else{
            $pageName = str_replace(' ', '_', $request->name);
            $page->fill([
                'name'=>"$request->name",
                'author'=>"$request->author",
                'content'=>"$request->contents",
                'link'=>"/$pageName",
                'active_menu'=>0,
            ]);
            $page->save();
            return redirect('admin-pages')->with(['name'=>$name]);
        }
    }
    public function editPage($id){
        $page = (new Page)->select([
            'id',
            'name',
            'content',
            'active_menu',
        ])->where('id',$id)->first();
        $name = "Редактирвоание страницы $page->name";
        return view('page-update')->with([
            'page'=>$page,
            'name'=>$name,
            ]);
    }
    public function updatePage(Request $request,$id){
        $name = "Список статей";
        $this->validate($request,[
            'name'=>'required|max:255',
            'contents'=>'required|max:255',
        ]);
        $post = (new Page)->find($id);
        $mark = 0;
        if($request->menu == true){
            $mark = 1;
        }else{
            $mark = 0;
        }
        if($mark == $post->active_menu){
            $post->fill([
                'name'=>"$request->name",
                'content'=>"$request->contents",
            ]);
            $post->update();
            return redirect('admin-pages')->with(['name'=>$name]);
        }else{
            if($post->active_menu == 1){
                $menu = (new Menu)->where('active_id', '=', "$id")->first();
                $post->fill([
                    'name'=>"$request->name",
                    'content'=>"$request->contents",
                    'active_menu'=>0,
                ]);
                $post->update();
                $menu->delete();
                return redirect('admin-pages')->with(['name'=>$name]);
            }
            elseif($post->active_menu == 0){
                $post->fill([
                    'name'=>"$request->name",
                    'content'=>"$request->contents",
                    'active_menu'=>1,
                ]);
                $post->update();
                $pageName = $post->name;
                return PageController::savePageInMenu($pageName);
            }
        }
    }
    public function savePageInMenu($pageName){
        $name = "Список страниц";
        $pageId = (new Page)->select([
            'id',
            'name',
            'link',
        ])->where('link','=',"/$pageName")->first();
        $addInMenuTable = new Menu;
        $addInMenuTable->fill([
            'title'=>"$pageId->name",
            'url'=>"$pageId->link",
            'active_id'=>"$pageId->id",
        ]);
        $addInMenuTable->save();
        return redirect('admin-pages')->with(['name'=>$name]);
    }
    /*public function about(){
        $page = (new Page)->select([
            'id',
            'name',
            'author',
            'description',
        ]);
        $name = "About";
        return view('content-page')
            ->with(['page'=>$page,'name'=>$name]);
    }
    public function contact(){
        $page = (new Page)->select([
            'id',
            'name',
            'author',
            'description',
        ]);
        $name = "Contact";
        return view('content-page')
            ->with(['page'=>$page,'name'=>$name]);
    }*/
}
