@extends('layouts.site')
@section('content')
    <div class="jumbotron">
        <div class="container">
            <div class="form">
                <form method="POST" action="{{route('postSave')}}">
                    <div class="form-group">
                        <label for="title">Название</label>
                        <input type="text" class="form-control" id="title" name="name">
                    </div>
                    <div class="form-group">
                        <label for="alias">Заголовок</label>
                        <input type="text" class="form-control" id="alias" name="title">
                    </div>
                    <div class="form-group">
                        <label for="shortDisc">Автор поста</label>
                        <textarea type="text" class="form-control" id="shortDisc" name="author"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foolCont">Полный текст</label>
                        <textarea type="text" class="form-control" id="foolCont" name="content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Отправить</button>
                    {{csrf_field()}}
                </form>
            </div>
        </div>
    </div>
@endsection