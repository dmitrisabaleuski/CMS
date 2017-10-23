@extends('layouts.site')
@section('content')
    <div class="add-page col-xl-12 col-md-12 col-sm-12 col-xs-12">
        <h1>{{$name}}</h1>
        <div class="container">
            <div class="form">
                <form method="POST" action="{{route('savePage',['id'=>Auth::user()->id])}}">
                    <div class="form-group">
                        <label for="title">Название</label>
                        <input type="text" class="form-control" id="title" name="name">
                    </div>
                    <div class="form-group">
                        <label for="shortDisc">Автор страницы</label>
                        <input type="text" class="form-control" id="shortDisc" name="author" value="{{Auth::user()->name}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="foolCont">Полный текст</label>
                        <textarea type="text" class="form-control" id="foolCont" name="contents"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Отправить</button>
                    {{csrf_field()}}
                </form>
            </div>
        </div>
    </div>
    <script src="{{URL::to('tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script>
        var editor_config = {
            path_absolute : "{{ URL::to('/') }}/",
            selector : "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.grtElementByTagName('body')[0].clientHeight;
                var cmsURL = editor_config.path_absolute+'laravel-filemanaget?field_name'+field_name;
                if (type = 'image') {
                    cmsURL = cmsURL+'&type=Images';
                } else {
                    cmsUrl = cmsURL+'&type=Files';
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizeble : 'yes',
                    close_previous : 'no'
                });
            }
        };

        tinymce.init(editor_config);
    </script>﻿
@endsection