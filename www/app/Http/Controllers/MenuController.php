<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Page;
use App\Model\Menu;
class MenuController extends Controller
{
    public function changeStatus($id){
        $menu = (new Menu)->select([
            'title',
            'active',
        ])->where('id',$id)->first();
        if($menu->active == 1){
            $menuInsert = (new Menu)->find($id);
            $menuInsert->fill([
                'active'=>0,
            ]);
            $menuInsert->update();
            return redirect('admin-menu');
        }else{$menuInsert = (new Menu)->find($id);
            $menuInsert->fill([
                'active'=>1,
            ]);
            $menuInsert->update();
            return redirect('admin-menu');
        }
    }
    public function changeName($id){
        $menu = (new Menu)->select([
            'id',
            'title',
        ])->where('id', $id)->first();
        $name = "Редактирование пункта меню $menu->title";
        return view('menu-edit')->with([
            'menu'=>$menu,
            'name'=>$name,
        ]);
    }
    public function updateName(Request $request,$id){
        $name = "Список меню";
        $this->validate($request,[
            'name'=>'required|max:255',
        ]);
        $menu = (new Menu)->find($id);
        $menu->fill([
            'title'=>"$request->name",
        ]);
        $menu->update();
        return redirect('admin-menu')->with(['name'=>$name]);
    }
}
