@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Inicio con Atom</div><br>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;
                    @if (starts_with(Auth::user()->avatar, 'http://') || starts_with(Auth::user()->avatar, 'https://'))
                        <img width="32px" height="32px" src="{{ Auth::user()->avatar }}">
                    @else
                        <img width="32px" height="32px" src="{{ Storage::url(Auth::user()->avatar) }}">
                    @endif
                    <b>{{ Auth::user()->name }}</b>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="panel panel-info">
                            <form action="{{ route('main.store') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <textarea name="message" cols="" rows="3" class="form-control" placeholder="¿Que estás pensando, {{ Auth::user()->name }}?">{{ old('message') }}
                                    </textarea>
                                    <i class="fa fa-camera-retro fa-lg" onclick="document.getElementById('file').click();"></i>
                                    <input type="file" name="image" style="display:none;" id="file" />
                                </div>
                                <button type="submit" class="btn btn-primary">Publicar</button>
                                <a href="/"><button type="button" class="btn btn-danger">Cancelar</button></a>
                            </form>
                            <br>
                            <div class="panel panel-default">
                                <div class="panel-heading">Lo que publican mis amigos</div>
                                <div class="panel-body">
                                    @foreach ($posts as $post)
                                        <a href="#" class="list-group-item ">
                                            @if (starts_with($post->avatar, 'http://') || starts_with($post->avatar, 'https://'))
                                                <img width="32px" height="32px" src="{{ $post->avatar }}">
                                            @else
                                                <img width="32px" height="32px" src="{{ Storage::url($post->avatar) }}">
                                            @endif
                                            {{ $post->name }}
                                            <p class="list-group-item-text"><br>{{ $post->message }}</p>
                                            @if ($post->image == "has not image" || $post->image == null)
                                            @else
                                                <img width="100%" height="100%" src="{{ Storage::url($post->image) }}">
                                            @endif
                                            <p class="text-gray-dark"><br><em><font size="2">{{ $post->created_at->diffForHumans() }}</font></em></p>
                                    
                                            @php
                                                $token = App\Like::did_you_like_it(Auth::user()->id,$post->id);
                                            @endphp

                                            @if(App\Like::likes_count($post->id) >= 0 && $token == null || $token->like == 0)
                                                <a class="like" id="{{ $post->id }}" href="{{ route('likes', ['publication' => $post->id]) }}">
                                                    {{-- Me gusta --}}
                                                    @if ($post->like == 0)
                                                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Me gusta
                                                    @else
                                                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Me gusta {{$post->id}}
                                                    @endif
                                                </a>
                                            @elseif(App\Like::likes_count($post->id) > 0 && $token->like == 1)
                                                <a class="dislike" id="{{ $post->id }}" href="{{ route('likes', ['publication' => $post->id]) }}">
                                                    {{-- No me gusta --}}
                                                    @if ($post->like == 0)
                                                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Me gusta
                                                    @else
                                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i> Me gusta {{$post->like}}
                                                    @endif
                                                </a>
                                            @endif

                                            <!--edit & delete-->
                                            @if (Auth::user()->id == $post->user_id)
                                                <a class="pull-right" href="{{ route('main.destroy', $post->id) }}">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                                <a class="pull-right" href="{{ route('main.edit', $post->id) }}">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;&nbsp;
                                                </a>
                                            @endif
                                            <!--comments-->
                                            <div class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                            <a class="pull-right" href="{{ route('comments.show', $post->id) }}">
                                                @if (App\Wall::comments_count($post->id) == 0)
                                                    comentar <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                                @elseif(App\Wall::comments_count($post->id) == 1)
                                                    {{ App\Wall::comments_count($post->id) }} comentario
                                                @else
                                                    {{ App\Wall::comments_count($post->id) }} comentarios
                                                @endif
                                            </a>
                                        </a><hr>
                                    @endforeach
                                    {{ $posts->render() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Mis Mascotas
                </div>
                <div class="panel panel-body">
                    <ul class="media-list">
                        <li class="media text-center">
                            @if ($pets->isEmpty())
                                Inscribe a tu mascota <a href="/pets/create">aquí</a>
                            @else
                                @foreach ($pets as $pet)
                                    <img width="98" height="98" src="{{ Storage::url($pet->photo) }}">
                                @endforeach
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

<script src="{{asset('js/funciones.js')}}" type="text/javascript"></script>

@endsection
