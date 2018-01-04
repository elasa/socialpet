@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Inicio</div><br>
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
                            <form action="{{ route('main.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <textarea name="message" cols="" rows="3" class="form-control" placeholder="¿Que estás pensando, {{ Auth::user()->name }}?">{{ old('message') }}</textarea>
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
                                            <p class="text-gray-dark"><br><em><font size="2">{{ $post->created_at->diffForHumans() }}</font></em></p>   
                                            
                                            
                                            <a class="like" href="{{ route('likes', ['publication' => $post->id]) }}">
                                                
                                                @if (App\Like::likes_count($post->id)>0)
                                                    {{ App\Like::likes_count($post->id) }}
                                                @else
                                                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                                @endif
                                            
                                            </a>&nbsp;&nbsp;  
                                            
                                            <a href="{{ route('comments.show', $post->id) }}"> 
                                                @if (App\Wall::comments_count($post->id) == 0)
                                                    comentar <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                                @elseif(App\Wall::comments_count($post->id) == 1)
                                                    {{ App\Wall::comments_count($post->id) }} comentario
                                                @else
                                                    {{ App\Wall::comments_count($post->id) }} comentarios    
                                                @endif

                                                @if (Auth::user()->id == $post->user_id)
                                                    <a class="pull-right" href="{{ route('main.destroy', $post->id) }}">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                    <a class="pull-right" href="{{ route('main.edit', $post->id) }}">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;&nbsp;
                                                    </a>
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


