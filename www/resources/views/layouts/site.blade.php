<?php
use Illuminate\Support\Facades\DB; ?>
        <!doctype html>
<html>
<head>
    <meta charset="utf8">
    <title>Main Page</title>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/boot/css/bootstrap.min.css')}}">
</head>
<body>
<div class="col-xl-6 col-md-6 col-sm-12 header">
    <h1>
        Главная страница
    </h1>
    <p><a class="btn btn-default edpost" href="/admin">Панель администратора</a></p>
</div>
<div class="col-xl-6 col-md-6 col-sm-12 auth">
    <h5>
        <a href="/">Авторизуйтесь</a> или <a href="">зарегестрируйтесь</a>
    </h5>
    
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
    <h1>
        Макет футера
    </h1>
</div>
</body>
</html>