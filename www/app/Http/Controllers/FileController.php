<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Model\File as FilesTable;
use App\Model\Image as ImageTable;
use App\Model\Archive as ArchiveTable;
use Illuminate\Support\Facades\Auth;
class FileController extends Controller
{

    public function addNewFile(Request $request){
        $filename = $request->file('loadfile')
            ->getClientOriginalName();
        $filename = str_replace(' ', '_', $filename);
        $mimetype = substr(strrchr($filename, '.'), 1);
        if($mimetype == 'txt'
            || $mimetype == 'doc'
            || $mimetype == 'docx'
            || $mimetype == 'odt'
            || $mimetype == 'rtf'
            || $mimetype == 'pdf'
            || $mimetype == 'epub'
            || $mimetype == 'fb2'
            || $mimetype == 'mobi'
            || $mimetype == 'lit'
            || $mimetype == 'djvu'){
            $request->file('loadfile')
                ->storeAs('files/files',"$filename");
            $filelink = $request->file('loadfile')
                ->storeAs('files/files',"$filename");
            $file = (new FilesTable);
            $file -> fill([
                'name'=>$filename,
                'mimetype'=>$mimetype,
                'link'=>$filelink,
                'user_id'=>Auth::user()->id,
            ]);
            $file->save();
            return redirect("admin-files");
        }else if($mimetype == 'jpeg'
            || $mimetype == 'jpg'
            || $mimetype == 'png'
            || $mimetype == 'gif'
            || $mimetype == 'tif'){
            $request->file('loadfile')->storeAs('files/all-multimedia', "$filename");
            $filelink = $request->file('loadfile')->storeAs('files/all-multimedia', "$filename");
            $image = (new ImageTable);
            $image -> fill([
                'name'=>$filename,
                'mimetype'=>$mimetype,
                'link'=>$filelink,
                'user_id'=>Auth::user()->id,
            ]);
            $image->save();
            return redirect("admin-multimedia");
        }
        else if($mimetype == '7z'
            || $mimetype == 'zip'
            || $mimetype == 'rar'
            || $mimetype == 'iso'){
            $request->file('loadfile')->storeAs('files/archive',"$filename");
            $filelink = $request->file('loadfile')->storeAs('files/archive', "$filename");
            $archive = (new ArchiveTable);
            $archive -> fill([
                'name'=>$filename,
                'mimetype'=>$mimetype,
                'link'=>$filelink,
                'user_id'=>Auth::user()->id,
            ]);
            $archive->save();
            return redirect("admin-archives");
        }else{
            die('Format is not supported! <a href="http://cms.dev/admin">Back to site</a> and try another format');
        }
    }
    public function deleteFile($fileid){
        $file = (new FilesTable)->find($fileid);
        $deletefile = $file->link;
        Storage::delete($deletefile);
        $file->delete();
        return redirect("admin-files");
    }
    public function deleteFileInAccaunt($fileid, $id){
        $file = (new FilesTable)->find($fileid);
        $deletefile = $file->link;
        Storage::delete($deletefile);
        $file->delete();
        return redirect("admin/user-$id");
    }
}
