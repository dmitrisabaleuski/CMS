<?php
use Illuminate\Support\Facades\DB;
use App\Model\User;
?>
<!doctype html>
<html>
<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main Page</title>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/boot/css/bootstrap.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<header class="col-xl-12 col-md-12 col-sm-12">
    <div class="col-xl-12 col-md-12 col-sm-12 menu">
        <ul>
            @if(count($menu))
                @foreach($menu as $menus)
                    <li>
                        <a href="{{route('pageShow',['pageUrl'=>$menus->url])}}">{{$menus->title}}</a>
                    </li>
                @endforeach
            @else

            @endif
        </ul>
    </div>
    <div class="title col-xl-6 col-md-6 col-sm-12">
        <h1>{{$name}}</h1>
        @role(['SuperAdmin','Admin'])
        <p class="adminPanel"><a class="btn btn-default panelEnter" href="/admin">Панель администратора</a></p>
        @endrole
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
@yield('content')

<footer class="col-xl-12 col-md-12 col-sm-12">
    <span>
        Макет футера
    </span>
</footer>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>