<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\User;

class ChangeAvatar extends Controller
{
    public function deleteAvatar($id){
        $post = (new User)->find($id);
        $deletefile = $post->avatar;
        Storage::delete($deletefile);
        $path = '';
        $post->fill([
            'avatar'=>$path,
        ]);
        $post->update();
        return redirect("admin/user-$id");
    }
}
