<?php

namespace App\Http\Controllers;

use Storage;
use App\Model\User;
use App\Model\Image as ImageTable;
use Illuminate\Http\Request;

class MultimediaController extends Controller
{
    public function deleteMultimedia($fileid)
    {
        $file = (new ImageTable)->find($fileid);
        $deletefile = $file->link;
        Storage::delete($deletefile);
        $file->delete();
        return redirect("admin-multimedia");

    }

    public function deleteMultimediaInAccaunt($fileid, $id)
    {
        $file = (new ImageTable)->find($fileid);
        $deletefile = $file->link;
        Storage::delete($deletefile);
        $file->delete();
        return redirect("admin/user-$id");
    }
}
