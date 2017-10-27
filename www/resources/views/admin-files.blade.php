@extends('layouts.adminpage')
@section('content')
    <div class="add-file col-xl-12 col-md-12 col-sm-12 col-xs-12">
        <p><a id="addFile" href=""><img src="img/plus-button.png" alt="add"></a></p>
    </div>
    <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 admin-files">
        <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 files">
            @if(count($files))
                @foreach($files as $file)
                    <div class="col-xl-2 col-md-2 col-sm-6 col-xs-12 file">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 file-inside">
                            @if($file->mimetype == 'pdf')
                            <img src="img/pdf.png" alt="docx">
                            <div class="file-options">
                                <p><a id="lookFile" target="_blank" role="buttom" href="{{$file->link}}"><img src="img/eye.png" alt="look"></a></p>
                                @role('SuperAdmin')
                                <p><a id="deleteFile" role="buttom" href="{{route('deleteFile',['fileid'=>$file->id])}}"><img src="img/trash.png" alt="delete"></a></p>
                                @endrole
                            </div>
                            @else
                                <img src="img/docx.png" alt="docx">
                                <div class="file-options">
                                    <p><a id="lookFile" download role="buttom" href="{{$file->link}}"><img src="img/file.png" alt="look"></a></p>
                                    @role('SuperAdmin')
                                    <p><a id="deleteFile" role="buttom" href="{{route('deleteFile',['fileid'=>$file->id])}}"><img src="img/trash.png" alt="delete"></a></p>
                                    @endrole
                                </div>
                            @endif
                        </div>
                        <p class="fileName">{{$file->name}}</p>
                    </div>
                @endforeach
            @else
                <p>Данный раздел не содержит файлов</p>
            @endif
        </div>
    </div>
@endsection