<?php
use Illuminate\Support\Facades\DB; ?>
        <!doctype html>
<html>
<head>
    <meta charset="utf8">
    <title>Test Page</title>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/boot/css/bootstrap.min.css')}}">
</head>
<body>
<div class="col-xl-12 col-md-12 col-sm-12 header">
    <h1>
        {{$header}}
    </h1>
    <p><a href="/{{$admin}}">{{$admin_name}}</a></p>
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
        {{$footer}}
    </h1>
</div>
</body>
</html>