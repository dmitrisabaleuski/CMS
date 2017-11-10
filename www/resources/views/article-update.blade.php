@extends('layouts.adminpage')
@section('content')
    <div class="jumbotron">
        <div class="container">
            @if($post)
                <p><a class="btn btn-default backpost" href="{{route('articleShow',['id'=>$post->id])}}">Вернуться к статье</a></p>
                <div class="form">
                    <form method="POST" action="{{route('articleUpdate',['post'=>$post->id])}}">
                        @if(count($page))
                            <div class="form-group">
                                <label for="hero">Прикрепить к странице(цам)</label>
                                <select size="3" multiple name="hero">
                                    @foreach($page as $pag)
                                        <option value="{{$pag->id}}">{{$pag->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="title">Название</label>
                            <input type="text" class="form-control" id="title" name="name" value="{{$post->name}}">
                        </div>
                        <div class="form-group">
                            <label for="alias">Заголовок</label>
                            <input type="text" class="form-control" id="alias" name="title" value="{{$post->title}}">
                        </div>
                        <div class="form-group">
                            <label for="shortDisc">Автор поста</label>
                            <input type="text" class="form-control" id="shortDisc" name="author_name" value="{{$post->author_name}}" readonly>
                        </div>
                        @if($post->view_on_main == 1)
                            <div class="form-group">
                                <label for="shortDisc">Вывод на главной</label>
                                <input type="checkbox" checked="checked" class="form-control" id="menuCheck" name="viewmenu">
                            </div>
                        @else
                            <div class="form-group">
                                <label for="shortDisc">Вывод на главной</label>
                                <input type="checkbox" class="form-control" id="menuCheck" name="viewmenu">
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="foolCont">Краткий текст</label>
                            <textarea type="text" class="form-control" id="foolCont" name="description">{{$post->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="foolCont">Полный текст</label>
                            <textarea type="text" class="form-control" id="foolCont" name="content">{{$post->content}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Отправить</button>
                        {{csrf_field()}}
                    </form>

                </div>
            @endif
        </div>
    </div>
@endsection