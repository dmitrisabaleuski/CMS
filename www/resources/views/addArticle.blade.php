@extends('layouts.adminpage')
@section('content')
    <div class="jumbotron">
        <div class="container">
            <div class="form">
                <form method="POST" action="{{route('articleSave',['id'=>Auth::user()->id])}}">
                    @if(count($page))
                    <div class="form-group">
                        <label for="hero">Прикрепить к странице(цам)</label>
                        <select size="3" multiple name="hero[]">
                            <option disabled>Выберите страницу(цы)</option>
                            @foreach($page as $pag)
                                <option value="{{$pag->id}}">{{$pag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
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
                        <input type="text" class="form-control" id="shortDisc" name="author_name" value="{{Auth::user()->name}}" readonly>
                        <input type="hidden" class="form-control" id="alias" name="author_id" value="{{Auth::user()->id}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="foolCont">Краткий текст</label>
                        <textarea type="text" class="form-control" id="foolCont" name="description"></textarea>
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