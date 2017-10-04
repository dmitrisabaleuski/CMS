@extends('layouts.adminpage')
@section('content')
    <div class="add-user col-xl-12 col-md-12 col-sm-12 col-xs-12">
        <p><a href="auth/register">Добавить пользователя</a></p>
    </div>
    <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 admin-users">
        <ul>
            @foreach($user as $users)
                <li>
                    <ul class="single-user">
                        <li><p>ID: <b> {{$users->id}} </b></p></li>
                        <li><p>ИМЯ: <b> {{$users->name}} </b></p></li>
                        <li><p>E-mail: <b> {{$users->email}} </b></p></li>
                        <li>
                            <ul>
                                <li><a class="btn btn-default edpost" role="buttom" href="{{route('usereditShow',['id'=>$users->id])}}">Редактировать</a></li>
                                <li>
                                    <form action="{{route('userDelete',['user'=>$users->id])}}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger">Удаление</button>
                                        {{csrf_field()}}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            @endforeach
            <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 pagin">
                {{ $user->links() }}
            </div>
        </ul>
    </div>
@endsection