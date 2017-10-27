@extends('layouts.adminpage')
@section('content')
    <div class="col-xl-12 col-md-12 col-sm-12 col-xs-1 all-about-user">
            <div class="account-info col-xl-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="user-photo col-xl-3 col-md-3 col-sm-12 col-xs-12">
                        @if(!empty($user->avatar))
                            <img id="avatar" src="{{asset($user->avatar)}}" alt="avatar">
                            <p><a id="changeAvatar" href="">Изменить Аватар</a></p>
                            <p><a id="deleteAvatar" href="{{route('avatarDelete',['id'=>Auth::user()->id])}}">Удалить Аватар</a></p>
                        @else
                            <img id="avatar" src="{{ asset('img/NO_IMAGE.png')}}" alt="no-avatar">

                            <p><a id="choiseAvatar" href="">Загрузить Аватар</a></p>
                        @endif
                    </div>
                    <div class="user-info col-xl-9 col-md-9 col-sm-12 col-xs-12">

                            <p>Имя: {{$user->name}}</p>
                            <p>E-mail: {{$user->email}}</p>
                            <p><a class="btn btn-default changepass" role="buttom" href="{{route('accountEdit',['id'=>$user->id])}}">Редактировать пользователя</a></p>

                    </div>
                <p class="avatar-error">
                    @if(Session::has('message'))
                        {{Session::get('message')}}
                    @endif
                </p>
            </div>
        <hr>
            <div class="postsbyuser col-xl-12 col-md-12 col-sm-12 col-xs-12">
                @if(!empty($post))
                    @foreach($post as $posts)
                        <li>
                            <div class="post-admin col-xl-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                                    <p class="post-atribut"> <b>Название статьи:</b>  {{$posts->name}} </p>
                                    <p class="post-atribut"> <b>Дата создания:</b> {{$posts->date}} </p>
                                </div>
                                <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                                    <p> <b>Содержание:</b>  {{$posts->content}}</p>
                                </div>
                                <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                                    <p> <b>Краткое содержание:</b>  {{$posts->description}}</p>
                                </div>
                            </div>
                            <ul>
                                <li><a class="btn btn-default edpost" role="buttom" href="{{route('articleEdit',['id'=>$posts->id])}}">Редактировать</a></li>
                                <li><a class="btn btn-default main" role="buttom" href="{{route('articleShow',['id'=>$posts->id])}}">Просмотреть</a></li>
                                <li>
                                    <form action="{{route('articleDelete',['postId'=>$posts->id])}}" method="POST">
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
                @else
                    <p>На данный момент, постов нет!</p>
                @endif
            </div>
    </div>

@endsection