@extends('layouts.site')
@section('content')
    <p class="backtomain"><a class="btn btn-default" href="/">Вернуться на главную</a></p>
    <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 singl-article">
        @if($post)
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2>{{$post->name}}</h2>
                    <p class="article-content">{{$post->content}}</p>
                    <p class="article-author">Автор: <span>{{$post->author_name}}</span></p>
                    @role(['SuperAdmin','Admin'])
                    <p><a class="btn btn-default edpost" role="buttom" href="{{route('articleEdit',['id'=>$post->id])}}">Редактировать</a></p>
                    @endrole
                </div>
        @endif
    </div>
@endsection