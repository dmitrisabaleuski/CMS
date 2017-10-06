<?php
use Illuminate\Support\Facades\DB;
use App\User;
?>
<!doctype html>
<html>
<head>
    <meta charset="utf8">
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
<div class="col-xl-12 col-md-12 col-sm-12 tabs">
    <!-- Это сами вкладки -->
    <div class="bar col-xl-2 col-md-2 col-sm-12">
        <ul class="tabNavigation col-xl-12 col-md-12 col-sm-12">
            <li><a class="" href="/admin-content">Статьи</a></li>
            @role('SuperAdmin')
            <li><a class="" href="/admin-user">Пользователи</a></li>
            @endrole
        </ul>
    </div>

    <!-- Это контейнеры содержимого -->
    <div id="content" class="col-xl-10 col-md-10 col-sm-12 tabs-content">
        @yield('content')
    </div>
</div>
<div class="col-xl-12 col-md-12 col-sm-12 footer">
    <h3>
        Макет футера
    </h3>
</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>