@extends('layouts.adminpage')
@section('content')
    <div class="add-menu col-xl-12 col-md-12 col-sm-12 col-xs-12">
        <p><a id="addMenu" href="/addPage"><img src="img/plus-button.png" alt="add"></a></p>
    </div>
    <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 admin-menu">
        <ul>
            @if(!empty($menu))
                @foreach($menu as $menus)
                    <li>
                        <div class="menu-admin col-xl-6 col-md-6 col-sm-12 col-xs-12">
                            <p class="page-atribut"> Название Меню:  <b> {{$menus->title}} </b></p>
                            @if($menus->active == 1)
                                <p> Статус:  <b class="page-active"> Активно </b></p>
                            @else
                                <p> Статус:  <b class="page-noactive"> Не активно </b></p>
                            @endif
                        </div>
                        <div class="menu-options col-xl-6 col-md-6 col-sm-12 col-xs-12">
                            <a href="{{route('changeStatus',['menuId'=>$menus->id])}}">Изменить статус</a>
                            <a href="{{route('changeName',['menuId'=>$menus->id])}}">Изменить название</a>
                            <a href="{{route('deleteMenu',['menuId'=>$menus->id])}}">Удалить</a>
                        </div>
                    </li>
                @endforeach
            @else
                <li><p>Данный раздел пуст</p></li>
            @endif
        </ul>
    </div>
@endsection