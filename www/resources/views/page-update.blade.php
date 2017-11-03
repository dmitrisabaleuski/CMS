@extends('layouts.adminpage')
@section('content')
    <div class="jumbotron">
        <div class="container">
            @if($page)
                <p><a class="btn btn-default backpost" href="{{route('pageShow',['id'=>$page->id])}}">Вернуться к статье</a></p>
                <div class="form">
                    <form method="POST" action="{{route('pageUpdate',['page'=>$page->id])}}">
                        <div class="form-group">
                            <label for="title">Название</label>
                            <input type="text" class="form-control" id="title" name="name" value="{{$page->name}}">
                        </div>
                        @if($page->active_menu == 1)
                            <div class="form-group">
                                <label for="shortDisc">Как пункт меню</label>
                                <input type="checkbox" checked="checked" class="form-control" id="menuCheck" name="menu">
                            </div>
                        @else
                            <div class="form-group">
                                <label for="shortDisc">Как пункт меню</label>
                                <input type="checkbox" class="form-control" id="menuCheck" name="menu">
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="foolCont">Полный текст</label>
                            <textarea type="text" class="form-control" id="foolCont" name="contents">{{$page->content}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Отправить</button>
                        {{csrf_field()}}
                    </form>

                </div>
            @endif
        </div>
    </div>
@endsection