@extends('layouts.site')
@section('content')
    <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 admin-content">
        <ul>
            @foreach($post as $posts)
                <li>
                    <div class="post-admin col-xl-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                            <p class="post-atribut"> Название статьи: <b> {{$posts->name}} </b></p>
                            <p class="post-atribut"> Автор: <b> {{$posts->author}} </b></p>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                            <p> Содержание: <b> {{$posts->content}}</b></p>
                        </div>
                    </div>
                    <ul>
                        <li><a class="btn btn-default" role="buttom" href="{{route('editShow',['id'=>$posts->id])}}">Редактировать</a></li>
                        <li><a class="btn btn-default" role="buttom" href="{{route('articleShow',['id'=>$posts->id])}}">Просмотреть</a></li>
                        <li>
                            <form action="{{route('postDelete',['post'=>$posts->id])}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Удаление</button>
                                {{csrf_field()}}
                            </form>
                        </li>
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
@endsection