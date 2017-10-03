@extends('layouts.userupdate')
@section('content')
    <div class="jumbotron">
        <div class="container">
            @if($user)
                <p><a class="btn btn-default backpost" href="admin">Back to admin panel</a></p>
                <div class="form">
                    <form method="POST" action="{{route('userpostUpdate',['user'=>$user->id])}}">
                        <div class="form-group">
                            <label for="title">Имя:</label>
                            <input type="text" class="form-control" id="title" name="name" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="alias">E-mail</label>
                            <input type="text" class="form-control" id="alias" name="email" value="{{$user->email}}">
                        </div>
                        <button type="submit" class="btn btn-default">Отправить</button>
                        {{csrf_field()}}
                    </form>

                </div>
            @endif
        </div>
    </div>
@endsection