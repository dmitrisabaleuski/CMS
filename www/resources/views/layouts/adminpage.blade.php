<?php
use Illuminate\Support\Facades\DB;
use App\Model\User;
?>
<!doctype html>
<html>
<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/tabs.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/boot/css/bootstrap.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<style>
    body{background: #9e9e9e;}
</style>
</head>
<body>
<header class="col-xl-12 col-md-12 col-sm-12 admin-panel">
    <div class="title col-xl-6 col-md-6 col-sm-12">
        <h1>{{$name}}</h1>
        <p class="backtomain"><a class="btn btn-default" href="/">Вернуться на главную</a></p>
    </div>
    <div class="col-xl-6 col-md-6 col-sm-12 auth">
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @guest
                <li><a href="{{ route('login') }}">Логин</a></li>
                <li><a href="{{ route('register') }}">Регистрация</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                    Выход
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    <p><a href="{{route('userAccount',['id'=>Auth::user()->id])}}">Мой аккаунт</a></p>
                    @endguest
        </ul>
    </div>
</header>

@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="col-xl-12 col-md-12 col-sm-12 tabs">
    <!-- Это сами вкладки -->
    <div class="bar col-xl-2 col-md-2 col-sm-12">
        <ul class="tabNavigation col-xl-12 col-md-12 col-sm-12">
            <li><a href="/admin-pages">Страницы</a></li>
            <li><a href="/admin-articles">Статьи</a></li>
            @role('SuperAdmin')
            <li><a href="/admin-user">Пользователи</a></li>
            @endrole
            <li><a href="/admin-multimedia">Мультимедиа</a></li>
            <li><a href="/admin-files">Файлы</a></li>
            <li><a href="/admin-archives">Архивы</a></li>
        </ul>
    </div>

    <!-- Это контейнеры содержимого -->
    <div id="content" class="col-xl-10 col-md-10 col-sm-12 tabs-content">
        @yield('content')
    </div>
</div>
<footer class="col-xl-12 col-md-12 col-sm-12">
    <span>
        Макет футера
    </span>
</footer>
<div class="loadAvatar">
    <div class="closes">
        <img id="close3" src="../delete.png" alt="close">
    </div>
    <form method="POST" enctype = "multipart/form-data" action="{{route('uploadAvatar',['id'=>Auth::user()->id])}}">
        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
            <label for="ava" class="col-md-4 control-label">Upload Image</label>

            <div class="col-md-6">
                <input id="ava" type="file" class="form-control" name="avatar" required>

                @if ($errors->has('avatar'))
                    <span class="help-block">
                        <strong>{{ $errors->first('avatar') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-default">Отправить</button>
        {{csrf_field()}}
    </form>
</div>
<div class="loadFile">
    <div class="closes">
        <img id="close2" src="../delete.png" alt="close">
    </div>
    <form method="POST" enctype="multipart/form-data" action="{{route('addFile')}}">
        <div class="form-group{{ $errors->has('loadfile') ? ' has-error' : '' }}">
            <label for="loadfile" class="col-md-4 control-label">Upload File</label>

            <div class="col-md-12">
                <input id="loadfile" type="file" class="form-control" name="loadfile" required>

                @if ($errors->has('loadfile'))
                    <span class="help-block">
                        <strong>{{ $errors->first('loadfile') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-default">Отправить</button>
        {{csrf_field()}}
    </form>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/forms.js') }}"></script>
<script src="{{URL::to('tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script>
    var editor_config = {
        path_absolute : "{{ URL::to('/') }}/",
        selector : "textarea",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.grtElementByTagName('body')[0].clientHeight;
            var cmsURL = editor_config.path_absolute+'laravel-filemanaget?field_name'+field_name;
            if (type = 'image') {
                cmsURL = cmsURL+'&type=Images';
            } else {
                cmsUrl = cmsURL+'&type=Files';
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizeble : 'yes',
                close_previous : 'no'
            });
        }
    };

    tinymce.init(editor_config);
</script>﻿
</body>
</html>