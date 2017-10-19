<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\File as FilesTable;
class FileController extends Controller
{
    public function openFiles(){
        $files = (new FilesTable)->select(['id','name','mimetype','link'])->get();
        return view('admin-files')
            ->with(['files'=>$files]);
    }
    public function addNewFile(Request $request){
        $filename = $request->file('loadfile')->getClientOriginalName();
        $filename = str_replace(' ', '_', $filename);
        $mimetype = substr(strrchr($filename, '.'), 1);
        $request->file('loadfile')
            ->storeAs('files/files',"$filename");
        $filelink = $request->file('loadfile')
            ->storeAs('files/files',"$filename");
        $file = (new FilesTable);
        $file -> fill([
            'name'=>$filename,
            'mimetype'=>$mimetype,
            'link'=>$filelink,
        ]);
        $file->save();
        return redirect("admin-files");
    }
    public function deleteFile($fileid){
        $file = (new FilesTable)->find($fileid);
        $deletefile = $file->link;
        Storage::delete($deletefile);
        $file->delete();
        return redirect("admin-files");
    }
}
