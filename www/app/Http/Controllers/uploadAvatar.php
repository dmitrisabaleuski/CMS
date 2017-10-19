<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class UploadAvatar extends Controller
{
    public function accountAvatar(Request $request,$id){
            $path = $request->file('avatar')->storeAs('files/all-multimedia/avatars','avatar-user'.$id.'.png');
            $post = (new User)->find($id);
            $post->fill([
                'avatar'=>$path,
            ]);
            $post->update();
            return redirect("admin/user-$id");
    }

}
