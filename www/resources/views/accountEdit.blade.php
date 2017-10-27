@extends('layouts.adminpage')
@section('content')
    <div class="jumbotron">
        <div class="container">
            @if($user)
                <p><a class="btn btn-default backpost" href="admin">Back to admin panel</a></p>
                <div class="form">
                    <form method="POST" action="{{route('accountUpdate',['user'=>$user->id])}}">
                        <div class="form-group">
                            <label for="title">Имя:</label>
                            <input type="text" class="form-control" id="title" name="name" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="alias">E-mail</label>
                            <input type="text" class="form-control" id="alias" name="email" value="{{$user->email}}">
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default">Отправить</button>
                        {{csrf_field()}}
                    </form>

                </div>
            @endif
        </div>
    </div>
@endsection