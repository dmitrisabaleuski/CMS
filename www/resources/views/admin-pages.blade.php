@extends('layouts.adminpage')
@section('content')
    <div class="add-page col-xl-12 col-md-12 col-sm-12 col-xs-12">
            <p><a id="addPage" href="/addPage"><img src="img/plus-button.png" alt="add"></a></p>
    </div>
    <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 admin-pages">
        <ul>
            @if(!empty($page))
                @foreach($page as $pages)
                    <li>
                        <div class="post-admin col-xl-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                                <p class="post-atribut"> Название страницы: <b> {{$pages->name}} </b></p>
                                <p class="post-atribut"> Автор: <b> {{$pages->author}} </b></p>
                            </div>
                            <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                                <p> Содержание: <b> {{$pages->content}}</b></p>
                            </div>
                        </div>
                        <ul>
                            <li><a class="btn btn-default edpage" role="buttom" href="{{route('editPage',['id'=>$pages->id])}}">Редактировать</a></li>
                            <li><a class="btn btn-default main" role="buttom" href="{{route('articleShow',['id'=>$pages->id])}}">Просмотреть</a></li>
                            <li>
                                <form action="{{route('pageDelete',['page'=>$pages->id])}}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Удаление</button>
                                    {{csrf_field()}}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endforeach
            @else
                <li><p>Данный раздел пуст</p></li>
            @endif
        </ul>
    </div>
@endsection