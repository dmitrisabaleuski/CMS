@extends('layouts.adminpage')
@section('content')
    <div class="add-archive col-xl-12 col-md-12 col-sm-12 col-xs-12">
        <p><a id="addFile" href=""><img src="img/plus-button.png" alt="add"></a></p>
    </div>
    <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 admin-archive">
        <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 archives">
                @if(count($archives))
                    @foreach($archives as $archive)
                        <div class="col-xl-2 col-md-2 col-sm-6 col-xs-12 archive">
                            <div class="archive-inside col-xl-12 col-md-12 col-sm-12 col-xs-12">
                                <img src="img/archive.png" alt="archive">
                                <div class="archive-options">
                                    <p><a id="lookFile" download role="buttom" href="{{$archive->link}}"><img src="img/file.png" alt="look"></a></p>
                                    @role('SuperAdmin')
                                        <p><a id="deleteIMG" role="buttom" href="{{route('deleteArchive',['archiveId'=>$archive->id])}}"><img src="img/trash.png" alt="delete"></a></p>
                                    @endrole
                                </div>
                            </div>
                            <p class="fileName">{{$archive->name}}</p>
                        </div>
                    @endforeach
                @else
                    <p>Данный раздел не содержит файлов</p>
                @endif
        </div>
    </div>
@endsection