@extends('layouts.site')
@section('content')
<div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 content">
        @if(!empty($post))
            @foreach($post as $posts)
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-xs-12 post">
                    <h3>
                        {{$posts->name}}
                    </h3>
                    <p>АВТОР: {{$posts->author_name}}</p>
                    <p>{{$posts->description}}</p>
                    <p><a class="btn btn-default main" role="buttom" href="{{route('articleShow',['id'=>$posts->id])}}">Подробнее</a></p>
                    @role('admin')
                    <p><a class="btn btn-default edpost" role="buttom" href="{{route('editShow',['id'=>$posts->id])}}">Редактировать</a></p>
                    @endrole
                </div>
            @endforeach
                <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 pagin">
                    {{ $post->links() }}
                </div>
        @else
            <p>На данный момент, постов нет!</p>
        @endif
</div>
@endsection