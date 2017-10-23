<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
<<<<<<< HEAD:www/app/Http/Controllers/uploadAvatar.php
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
=======

class UploadAvatar extends Controller
{
    public function accountAvatar(Request $request, $id)
    {
        /*$user = $id;
        $file = $request->file('avatar');
        $filename = 'avatar-'.$user;
            Storage::disk('local')->put($filename, $file);
            return redirect("admin/user-$user");*/
        $path = $request->file('avatar')->store('avatars');
        $post = (new User)->find($id);
        $post->fill([
            'avatar' => $path,
        ]);
        $post->update();
        return redirect("admin/user-$id");
>>>>>>> b117561fcc059e302b03c38ea8f6b7cade0dcedc:www/app/Http/Controllers/UploadAvatar.php
    }

}
