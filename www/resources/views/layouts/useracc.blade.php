<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\User;
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
<div class="col-xl-12 col-md-12 col-sm-12 header header-admin">
    <div class="col-xl-6 col-md-6 col-sm-12 admin-all">
        <h3>
            Панель Администратора
        </h3>
        <p><a class="btn btn-default edpost" href="/">Back to main Page</a></p>
        @role(['SuperAdmin','Admin'])
            <p><a class="btn btn-default edpost" href="/admin">Панель администратора</a></p>
        @endrole
    </div>
    <div class="col-xl-6 col-md-6 col-sm-12 admin-auth">
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
            @endguest
        </ul>
    </div>
</div>

@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
@yield('content')
<div class="col-xl-12 col-md-12 col-sm-12 footer">
    <h3>
        Макет футера
    </h3>
</div>
<div class="loadImage">
    <div class="closes">
        <img id="close" src="../delete.png" alt="close">
    </div>
    <form method="POST" enctype = "multipart/form-data" action="{{route('uploadAva',['id'=>Auth::user()->id])}}">
        <label for="title"><b>Avatar:</b></label>
        <input type="file" class="form-control" id="title" name="avatar">
        <button type="submit" class="btn btn-default">Отправить</button>
        {{csrf_field()}}
    </form>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $('#choiseAvatar').on('click', function(){
        event.preventDefault();
        $('.loadImage').css('display','block');
    })
    $('#close').on('click',function(){
        $('.loadImage').css('display','none');
    });
</script>
</body>
</html>