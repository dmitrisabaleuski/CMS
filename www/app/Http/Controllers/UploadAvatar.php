<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
    }

}
