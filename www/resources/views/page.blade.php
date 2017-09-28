@extends('layouts.site')
@section('content')
<div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 content">
        @if(!empty($post))
            @foreach($post as $posts)
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-xs-12">
                    <h3>
                        {{$posts->name}}
                    </h3>
                    <p>{{$posts->description}}</p>
                    <p>Автор {{$posts->author}}</p>
                    <p><a class="btn btn-default main" role="buttom" href="{{route('articleShow',['id'=>$posts->id])}}">Подробнее</a></p>

                </div>
            @endforeach
        @else
            <p>На данный момент, постов нет!</p>
        @endif
</div>
<div class="add-post col-xl-12 col-md-12 col-sm-12 col-xs-12">
    <p><a href="/page/add">Добавить пост</a></p>
</div>
@endsection