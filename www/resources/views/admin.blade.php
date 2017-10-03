@extends('layouts.adminpage')
@section('content')
    <div class="add-post col-xl-12 col-md-12 col-sm-12 col-xs-12">
        <p><a href="/page/add">Добавить пост</a></p>
    </div>
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
                        <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                            <p> Краткое содержание: <b> {{$posts->description}}</b></p>
                        </div>
                    </div>
                    <ul>
                        <li><a class="btn btn-default edpost" role="buttom" href="{{route('editShow',['id'=>$posts->id])}}">Редактировать</a></li>
                        <li><a class="btn btn-default main" role="buttom" href="{{route('articleShow',['id'=>$posts->id])}}">Просмотреть</a></li>
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
                <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 pagin">
                    {{ $post->links() }}
                </div>
        </ul>
    </div>
@endsection
@section('users')
    <div class="add-user col-xl-12 col-md-12 col-sm-12 col-xs-12">
        <p><a href="">Добавить пользователя</a></p>
    </div>
    <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 admin-users">
        <ul>
            @foreach($user as $users)
                <li>
                    <ul class="single-user">
                        <li><p>ID: <b> {{$users->id}} </b></p></li>
                        <li><p>ИМЯ: <b> {{$users->name}} </b></p></li>
                        <li><p>E-mail: <b> {{$users->email}} </b></p></li>
                        <li>
                            <ul>
                                <li><a class="btn btn-default edpost" role="buttom" href="{{route('usereditShow',['id'=>$users->id])}}">Редактировать</a></li>
                                <li>
                                    <form action="{{route('userDelete',['user'=>$users->id])}}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger">Удаление</button>
                                        {{csrf_field()}}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            @endforeach
            <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 pagin">
                {{ $post->links() }}
            </div>
        </ul>
    </div>
@endsection