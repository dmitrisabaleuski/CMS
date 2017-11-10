@extends('layouts.adminpage')
@section('content')
    <div class="jumbotron">
        <div class="container">
            @if($menu)
                <p><a class="btn btn-default backpost" href="admin-menu">Вернуться к списку меню</a></p>
                <div class="form">
                    <form method="POST" action="{{route('menuUpdate',['menuId'=>$menu->id])}}">
                        <div class="form-group">
                            <label for="title">Название</label>
                            <input type="text" class="form-control" id="title" name="name" value="{{$menu->title}}">
                        </div>
                        <button type="submit" class="btn btn-default">Отправить</button>
                        {{csrf_field()}}
                    </form>

                </div>
            @endif
        </div>
    </div>
@endsection