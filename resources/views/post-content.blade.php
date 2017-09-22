@extends('layouts.site')
@section('content')
    <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 content">
    @if($post)
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <h1>
                    {{$post->name}}
                </h1>
                <p>{{$post->content}}</p>
                <p>Автор {{$post->author}}</p>
                <p><a role="buttom" href="{{route('editShow',['id'=>$post->id])}}">Редактировать</a></p>
            </div>
    @endif
    </div>
@endsection