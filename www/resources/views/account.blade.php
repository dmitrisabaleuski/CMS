@extends('layouts.adminpage')
@section('content')
    <div class="col-xl-12 col-md-12 col-sm-12 col-xs-1 all-about-user">
        <p class="tableName">Основная информация</p>
        <div class="account-info col-xl-12 col-md-12 col-sm-12 col-xs-12">
            <div class="user-photo col-xl-3 col-md-3 col-sm-12 col-xs-12">
                @if(!empty($user->avatar))
                    <img id="avatar" src="{{asset($user->avatar)}}" alt="avatar">
                    <p><a id="changeAvatar" href="">Изменить Аватар</a></p>
                    <p><a id="deleteAvatar" href="{{route('avatarDelete',['id'=>Auth::user()->id])}}">Удалить Аватар</a></p>
                @else
                    <img id="avatar" src="{{ asset('img/NO_IMAGE.png')}}" alt="no-avatar">
                    <p><a id="choiseAvatar" href="">Загрузить Аватар</a></p>
                @endif
            </div>
            <div class="user-info col-xl-9 col-md-9 col-sm-12 col-xs-12">
                <p>Имя: {{$user->name}}</p>
                <p>E-mail: {{$user->email}}</p>
                <p><a class="btn btn-default changepass" role="buttom" href="{{route('accountEdit',['id'=>$user->id])}}">Редактировать пользователя</a></p>
            </div>
            <p class="avatar-error">
                @if(Session::has('message'))
                    {{Session::get('message')}}
                @endif
            </p>
        </div>
        <hr>
        <div class="imagesbyuser col-xl-12 col-md-12 col-sm-12 col-xs-12">
            <p class="tableName">Загруженые фото</p>
            @if(count($images))
                @foreach($images as $image)
                    <div class="col-xl-1 col-md-1 col-sm-4 col-xs-12 image">
                        <img src="../{{$image->link}}" alt="image">
                        <div class="image-options">
                            <p><a id="lookIMG" target="_blank" role="buttom" href="../{{$image->link}}"><img src="../img/eye.png" alt="look"></a></p>
                            @role('SuperAdmin')
                            <p><a id="deleteIMG" role="buttom" href="{{route('deleteMultimediaInAccaunt',['imageId'=>$image->id,'id'=>Auth::user()->id])}}"><img src="../img/trash.png" alt="delete"></a></p>
                            @endrole
                        </div>
                    </div>
                @endforeach
                @else
                <p class="emptyTable">У вас нет загруженных фото</p>
            @endif
        </div>
        <hr>
        <div class="archivesbyuser col-xl-12 col-md-12 col-sm-12 col-xs-12">
            <p class="tableName">Загруженные архивы</p>
            @if(count($archives))
                @foreach($archives as $archive)
                    <div class="col-xl-2 col-md-2 col-sm-4 col-xs-12 archive">
                        <div class="archive-inside col-xl-12 col-md-12 col-sm-12 col-xs-12">
                            <img src="../img/archive.png" alt="archive">
                            <div class="archive-options">
                                <p><a id="lookFile" download role="buttom" href="../{{$archive->link}}"><img src="../img/file.png" alt="look"></a></p>
                                @role('SuperAdmin')
                                <p><a id="deleteIMG" role="buttom" href="{{route('deleteArchiveInAccaunt',['archiveId'=>$archive->id,'id'=>Auth::user()->id])}}"><img src="../img/trash.png" alt="delete"></a></p>
                                @endrole
                            </div>
                        </div>
                        <p class="fileName">{{$archive->name}}</p>
                    </div>
                @endforeach
                @else
                <p class="emptyTable">У вас нет загруженных архивов</p>
            @endif
        </div>
        <hr>
        <div class="filesbyuser col-xl-12 col-md-12 col-sm-12 col-xs-12">
            <p class="tableName">Загруженные файлы</p>
            @if(count($files))
                @foreach($files as $file)
                    <div class="col-xl-2 col-md-2 col-sm-6 col-xs-12 file">
                        <div class="file-inside col-xl-12 col-md-12 col-sm-12 col-xs-12">
                            @if($file->mimetype == 'pdf')
                                <img src="../img/pdf.png" alt="pdf">
                                <div class="file-options">
                                    <p><a id="lookFile" target="_blank" role="buttom" href="../{{$file->link}}"><img src="../img/eye.png" alt="look"></a></p>
                                    @role('SuperAdmin')
                                    <p><a id="deleteFile" role="buttom" href="{{route('deleteFileInAccaunt',['fileid'=>$file->id,'id'=>Auth::user()->id])}}"><img src="../img/trash.png" alt="delete"></a></p>
                                    @endrole
                                </div>
                            @elseif($file->mimetype == 'doc')
                                <img src="../img/doc.png" alt="doc">
                            <div class="file-options">
                                <p><a id="lookFile" target="_blank" role="buttom" href="../{{$file->link}}"><img src="../img/eye.png" alt="look"></a></p>
                                @role('SuperAdmin')
                                <p><a id="deleteFile" role="buttom" href="{{route('deleteFileInAccaunt',['fileid'=>$file->id,'id'=>Auth::user()->id])}}"><img src="../img/trash.png" alt="delete"></a></p>
                                @endrole
                            </div>
                            @elseif($file->mimetype == 'odt')
                                <img src="../img/odt.png" alt="odt">
                            <div class="file-options">
                                <p><a id="lookFile" target="_blank" role="buttom" href="../{{$file->link}}"><img src="../img/eye.png" alt="look"></a></p>
                                @role('SuperAdmin')
                                <p><a id="deleteFile" role="buttom" href="{{route('deleteFileInAccaunt',['fileid'=>$file->id,'id'=>Auth::user()->id])}}"><img src="../img/trash.png" alt="delete"></a></p>
                                @endrole
                            </div>
                            @elseif($file->mimetype == 'rtf')
                                <img src="../img/rtf.png" alt="rtf">
                            <div class="file-options">
                                <p><a id="lookFile" target="_blank" role="buttom" href="../{{$file->link}}"><img src="../img/eye.png" alt="look"></a></p>
                                @role('SuperAdmin')
                                <p><a id="deleteFile" role="buttom" href="{{route('deleteFileInAccaunt',['fileid'=>$file->id,'id'=>Auth::user()->id])}}"><img src="../img/trash.png" alt="delete"></a></p>
                                @endrole
                            </div>
                            @elseif($file->mimetype == 'epub')
                                <img src="../img/epub.png" alt="epub">
                            <div class="file-options">
                                <p><a id="lookFile" target="_blank" role="buttom" href="../{{$file->link}}"><img src="../img/eye.png" alt="look"></a></p>
                                @role('SuperAdmin')
                                <p><a id="deleteFile" role="buttom" href="{{route('deleteFileInAccaunt',['fileid'=>$file->id,'id'=>Auth::user()->id])}}"><img src="../img/trash.png" alt="delete"></a></p>
                                @endrole
                            </div>
                            @elseif($file->mimetype == 'fb2')
                                <img src="../img/fb2.png" alt="fb2">
                            <div class="file-options">
                                <p><a id="lookFile" target="_blank" role="buttom" href="../{{$file->link}}"><img src="../img/eye.png" alt="look"></a></p>
                                @role('SuperAdmin')
                                <p><a id="deleteFile" role="buttom" href="{{route('deleteFileInAccaunt',['fileid'=>$file->id,'id'=>Auth::user()->id])}}"><img src="../img/trash.png" alt="delete"></a></p>
                                @endrole
                            </div>
                            @elseif($file->mimetype == 'mobi')
                                <img src="../img/mobi.png" alt="mobi">
                            <div class="file-options">
                                <p><a id="lookFile" target="_blank" role="buttom" href="../{{$file->link}}"><img src="../img/eye.png" alt="look"></a></p>
                                @role('SuperAdmin')
                                <p><a id="deleteFile" role="buttom" href="{{route('deleteFileInAccaunt',['fileid'=>$file->id,'id'=>Auth::user()->id])}}"><img src="../img/trash.png" alt="delete"></a></p>
                                @endrole
                            </div>
                            @elseif($file->mimetype == 'lit')
                                <img src="../img/lit.png" alt="lit">
                            <div class="file-options">
                                <p><a id="lookFile" target="_blank" role="buttom" href="../{{$file->link}}"><img src="../img/eye.png" alt="look"></a></p>
                                @role('SuperAdmin')
                                <p><a id="deleteFile" role="buttom" href="{{route('deleteFileInAccaunt',['fileid'=>$file->id,'id'=>Auth::user()->id])}}"><img src="../img/trash.png" alt="delete"></a></p>
                                @endrole
                            </div>
                            @elseif($file->mimetype == 'djvu')
                                <img src="../img/djvu.png" alt="djvu">
                            <div class="file-options">
                                <p><a id="lookFile" target="_blank" role="buttom" href="../{{$file->link}}"><img src="../img/eye.png" alt="look"></a></p>
                                @role('SuperAdmin')
                                <p><a id="deleteFile" role="buttom" href="{{route('deleteFileInAccaunt',['fileid'=>$file->id,'id'=>Auth::user()->id])}}"><img src="../img/trash.png" alt="delete"></a></p>
                                @endrole
                            </div>
                            @else
                                <img src="../img/docx.png" alt="docx">
                                <div class="file-options">
                                    <p><a id="lookFile" download role="buttom" href="../{{$file->link}}"><img src="../img/file.png" alt="look"></a></p>
                                    @role('SuperAdmin')
                                    <p><a id="deleteFile" role="buttom" href="{{route('deleteFileInAccaunt',['fileid'=>$file->id,'id'=>Auth::user()->id])}}"><img src="../img/trash.png" alt="delete"></a></p>
                                    @endrole
                                </div>
                            @endif
                        </div>
                        <p class="fileName">{{$file->name}}</p>
                    </div>
                @endforeach
                @else
                <p class="emptyTable">У вас нет загруженных файлов</p>
            @endif
        </div>
        <hr>
            <div class="postsbyuser col-xl-12 col-md-12 col-sm-12 col-xs-12">
                @if(!empty($post))
                    @foreach($post as $posts)
                        <li>
                            <div class="post-admin col-xl-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                                    <p class="post-atribut"> <b>Название статьи:</b>  {{$posts->name}} </p>
                                    <p class="post-atribut"> <b>Дата создания:</b> {{$posts->date}} </p>
                                </div>
                                <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                                    <p> <b>Содержание:</b>  {{$posts->content}}</p>
                                </div>
                                <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                                    <p> <b>Краткое содержание:</b>  {{$posts->description}}</p>
                                </div>
                            </div>
                            <ul>
                                <li><a class="btn btn-default edpost" role="buttom" href="{{route('articleEdit',['id'=>$posts->id])}}">Редактировать</a></li>
                                <li><a class="btn btn-default main" role="buttom" href="{{route('articleShow',['id'=>$posts->id])}}">Просмотреть</a></li>
                                <li>
                                    <form action="{{route('articleDelete',['postId'=>$posts->id])}}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger">Удаление</button>
                                        {{csrf_field()}}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endforeach
                        <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 pagin">
                            {{ $post->links() }}
                        </div>
                @else
                    <p class="emptyTable">На данный момент, постов нет!</p>
                @endif
            </div>
    </div>

@endsection