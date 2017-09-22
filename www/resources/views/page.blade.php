@extends('layouts.site')
@section('content')
<div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 content">

            @foreach($post as $posts)
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <h1>
                        {{$posts->name}}
                    </h1>
                    <p>{{$posts->content}}</p>
                    <p>Автор {{$posts->author}}</p>
                    <p><a class="btn btn-default" role="buttom" href="{{route('articleShow',['id'=>$posts->id])}}">Подробнее</a></p>
                    <form action="{{route('postDelete',['post'=>$posts->id])}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Удаление</button>
                        {{csrf_field()}}
                    </form>
                </div>
            @endforeach
</div>
<div class="add-post col-xl-12 col-md-12 col-sm-12 col-xs-12">
    <p><a href="/page/add">Добавить пост</a></p>
</div>
@endsection