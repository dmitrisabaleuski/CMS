@extends('layouts.site')
@section('content')
    <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 content-page">
        @if($page)
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 singl-page">
                <h2>{{$page->name}}</h2>
                <p class="page-author">Автор: <span>{{$page->author}}</span></p>
                <p class="page-content">{!!$page->content!!}</p>
                @role('admin')
                <p><a class="btn btn-default edpage" role="buttom" href="{{route('editPage',['id'=>$post->id])}}">Редактировать</a></p>
                @endrole
            </div>
        @endif
    </div>
@endsection