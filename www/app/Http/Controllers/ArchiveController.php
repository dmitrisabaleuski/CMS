<?php

namespace App\Http\Controllers;
use Storage;
use App\Model\Archive as ArchiveTable;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function deleteArchive($archive){
        $file = (new ArchiveTable)->find($archive);
        $deletefile = $file->link;
        Storage::delete($deletefile);
        $file->delete();
        return redirect("admin-archives");

    }
    public function deleteArchiveInAccaunt($archive,$id){
        $file = (new ArchiveTable)->find($archive);
        $deletefile = $file->link;
        Storage::delete($deletefile);
        $file->delete();
        return redirect("admin/user-$id");
    }
}
