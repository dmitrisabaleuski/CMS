@extends('layouts.adminpage')
@section('content')
    <div class="add-article col-xl-12 col-md-12 col-sm-12 col-xs-12">
        <p><a id="addArticle" href="/articleAdd"><img src="img/plus-button.png" alt="add"></a></p>
    </div>
    <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 admin-content">
        <ul>
            @foreach($post as $posts)
                <li>
                    <div class="post-admin col-xl-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                            <p class="post-atribut"> Название статьи: <b> {{$posts->name}} </b></p>
                            <p class="post-atribut"> Автор: <b> {{$posts->author_name}} </b></p>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                            <p> Содержание: <b> {!!$posts->content!!}</b></p>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                            <p> Краткое содержание: <b> {!!$posts->description!!}</b></p>
                        </div>
                    </div>
                    <ul>
                        <li><a class="btn btn-default edpost" role="buttom"
                               href="{{route('articleEdit',['id'=>$posts->id])}}">Редактировать</a></li>
                        <li><a class="btn btn-default main" role="buttom"
                               href="{{route('articleShow',['id'=>$posts->id])}}">Просмотреть</a></li>
                        <li>
                            <form action="{{route('articleDelete',['postId'=>$posts->id])}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Удаление</button>
                                {{csrf_field()}}
                            </form>
                        </li>
                    </ul>
                    @if($posts->view_on_main == 1)
                        <ul class="partOf">
                            <li>
                                <p class="partOfMenu">Выводится на главной</p>
                            </li>
                        </ul>
                    @endif
                </li>
            @endforeach
            <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 pagin">
                {{ $post->links() }}
            </div>
        </ul>
    </div>
@endsection