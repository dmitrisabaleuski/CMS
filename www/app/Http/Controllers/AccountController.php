<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Article;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AccountController extends Controller
{
    public function account($id)
    {
        $user = (new User)->select([
            'id',
            'name',
            'email',
            'avatar',
        ])->where('id', $id)->first();
        $post = (new Article)->select([
            'id',
            'name',
            'author_name',
            'description',
            'date',
            'content',
        ])->where('author_id',
            $id)->orderBy('id', 'desc')->paginate(5);
        return view('account')->with([
            'user' => $user,
            'post' => $post,
            'name'=> $user->name,
        ]);
    }

    public function accountEdit($id)
    {
        $user = (new User)->select([
            'id',
            'name',
            'email',
        ])->where('id', $id)->first();
        $name = "Редактирование аккаунта ". $user->name;
        return view('accountEdit')->with([
            'user' => $user,
            'name'=> $name,
        ]);
    }

    public function accountUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
        ]);
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        (new User)->find($id)->fill($data)->update();
        $user = (new User)->find($id)->name;
        return redirect("admin/user-$id")->with(['name'=>$user]);
    }
    public function userEdit($id){
        $user = (new User)
            ->select(['name','email'])
            ->where('id',$id)->first();
        return view('user-update')->with([
            'user'=>$user,
            'name'=> "Редактирование пользователя ". $user->name,
        ]);
    }
    public function userUpdate(Request $request,$id){
        $this->validate($request,[
            'name'=>'required|max:255',
            'email'=>'required|max:255',
            'password' => bcrypt($request['password']),
        ]);
        $data = $request ->all();
        $post = (new User)->find($id);
        $post->fill($data);
        $post->update();
        return redirect('admin-user')->with(['name'=> "Список пользователей",]);
    }
    public function accountAvatar(Request $request,$id)
    {
        $path = $request->file('avatar')
            ->storeAs('files/all-multimedia/avatars', 'avatar-user' . $id . '.png');
        $post = (new User)->find($id);
        $post->fill([
            'avatar' => $path,
        ]);
        $post->update();
        $user = $post->name;
        return redirect("admin/user-$id")->with(['name'=> $user,]);
    }
    public function deleteAvatar($id)
    {
        $post = (new User)->find($id);
        $deletefile = $post->avatar;
        Storage::delete($deletefile);
        $path = '';
        $post->fill([
            'avatar'=>$path,
        ]);
        $post->update();
        $user = $post->name;
        return redirect("admin/user-$id")->with(['name'=> $user,]);
    }
}
