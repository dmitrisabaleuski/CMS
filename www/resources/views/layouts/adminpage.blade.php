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
    <h3>
        Панель Администратора
    </h3>
    <p><a href="/">Back to main Page</a></p>
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
</body>
</html>