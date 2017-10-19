@extends('layouts.adminpage')
@section('content')
    <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 admin-multimedia">
        <div class="multimedia-options col-xl-12 col-md-12 col-sm-12 col-xs-12">
            <p><a id="add" href=""><img src="img/plus-button.png" alt="add"></a></p>
        </div>
        <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 images">
            @if(!empty($files))
                @for($i=0;$i<count($files);$i++)
                    <div class="col-xl-3 col-md-3 col-sm-6 col-xs-12 image">
                        <img src="{{$files[$i]}}" alt="image">
                        <div class="image-options">
                            <p><a id="lookIMG" target="_blank" role="buttom" href="{{$files[$i]}}"><img src="img/eye.png" alt="look"></a></p>
                            @role('SuperAdmin')
                                <p><a id="deleteIMG" role="buttom" href="{{route('deleteIMG',['file'=>$files[$i]])}}"><img src="img/trash.png" alt="delete"></a></p>
                            @endrole
                        </div>
                    </div>
                @endfor
            @else
                    <p>Данный раздел не содержит файлов</p>
            @endif
        </div>
    </div>
@endsection