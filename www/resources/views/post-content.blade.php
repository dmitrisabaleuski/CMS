@extends('layouts.site')
@section('content')
    <p><a class="btn btn-default edpost" href="/">Back to main Page</a></p>
    <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 content">
    @if($post)
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1>
                    {{$post->name}}
                </h1>
                <p>{{$post->content}}</p>
                <p>Автор {{$post->author}}</p>
                @role('admin')
                <p><a class="btn btn-default edpost" role="buttom" href="{{route('editShow',['id'=>$post->id])}}">Редактировать</a></p>
                @endrole
            </div>
    @endif
    </div>
@endsection