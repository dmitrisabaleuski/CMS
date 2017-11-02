@extends('layouts.adminpage')
@section('content')
    <div class="add-multimedia col-xl-12 col-md-12 col-sm-12 col-xs-12">
        <p><a id="addFile" href=""><img src="img/plus-button.png" alt="add"></a></p>
    </div>
    <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 admin-multimedia">
        <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 images">
            @if(count($files))
                @foreach($files as $file)
                    <div class="col-xl-3 col-md-3 col-sm-6 col-xs-12 image">
                        <img src="{{$file->link}}" alt="image">
                        <div class="image-options">
                            <p><a id="lookIMG" target="_blank" role="buttom" href="{{$file->link}}"><img src="img/eye.png" alt="look"></a></p>
                            @role('SuperAdmin')
                                <p><a id="deleteIMG" role="buttom" href="{{route('deleteMultimedia',['imageId'=>$file->id])}}"><img src="img/trash.png" alt="delete"></a></p>
                            @endrole
                        </div>
                    </div>
                @endforeach
            @else
                    <p>Данный раздел не содержит файлов</p>
            @endif
        </div>
    </div>
@endsection