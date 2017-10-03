<?php
use Illuminate\Support\Facades\DB; ?>
        <!doctype html>
<html>
<head>
    <meta charset="utf8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/boot/css/bootstrap.min.css')}}">
</head>
<body>
<div class="col-xl-12 col-md-12 col-sm-12 header">
    <div class="col-xl-6 col-md-6 col-sm-12 admin-all">
        <h3>
            панель редактирвания поста
        </h3>
        <p><a class="btn btn-default edpost" href="/">Back to main Page</a></p>
        @role('admin')
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
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>