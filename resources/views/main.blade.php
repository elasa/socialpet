@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Inicio</div><br>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;
                    {{-- <img width="32px" height="32px" src="{{ Storage::url($avatar) }}" alt=""> --}}
                    @if (starts_with(Auth::user()->avatar, 'http://') || starts_with(Auth::user()->avatar, 'https://'))   
                        <img width="32px" height="32px" src="{{ Auth::user()->avatar }}">
                    @else
                        <img width="32px" height="32px" src="{{ Storage::url(Auth::user()->avatar) }}">
                    @endif

                    <b>{{ $user }}</b>
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
                            <div class="panel-heading">Lo que comentan mis amigos</div>
                            <div class="panel-body">
                                @foreach ($posts as $post)
                                    <a href="#" class="list-group-item ">
                                        @if (starts_with($post->avatar, 'http://') || starts_with($post->avatar, 'https://'))   
                                        <img width="32px" height="32px" src="{{ $post->avatar }}">
                                        @else
                                        <img width="32px" height="32px" src="{{ Storage::url($post->avatar) }}">
                                        @endif 
                                        {{ $post->name }}
                                        <p class="list-group-item-text">{{ $post->message }}</p>
                                        <p class="list-group-item-text">{{ $post->created_at->diffForHumans() }}</p>
                                        <a href="{{ route('comments.show', $post->id ) }}">
                                            @if (App\Wall::comments_count($post->id) == 0)
                                                comentar
                                            @elseif(App\Wall::comments_count($post->id) == 1)
                                                {{ App\Wall::comments_count($post->id) }} comentario
                                            @else
                                                {{ App\Wall::comments_count($post->id) }} comentarios    
                                            @endif
                                        </a>
                                    </a>    
                                @endforeach
                            </div>
                        </div>
                        
                                    
                           {{--  {{ dd($users[0]->wall->publications) }} --}}
                        
                            {{-- @php
                                $avatar_post = "";
                            @endphp
                            @foreach ($public_post as $post)
                                @foreach ($user_names as $u)
                                    @if ($post->wall_id == $u->wall_id)
                                        @php
                                            $user_post = $u->name;
                                            $email_post = $u->email;
                                            $avatar_post = $u->avatar;
                                        @endphp
                                    @endif   
                                @endforeach
                            <div class="list-group">
                                <a href="#" class="list-group-item ">
                                    <h5 class="list-group-item-heading"> 
                                        @if (starts_with($avatar_post, 'http://') || starts_with($avatar_post, 'https://'))   
                                            <img width="32px" height="32px" src="{{ $avatar_post }}">
                                        @else
                                            <img width="32px" height="32px" src="{{ Storage::url($avatar_post) }}">
                                        @endif  

                                        @if ($user_post==null)
                                            {{ $email_post }}
                                        @else
                                            {{ $user_post }}
                                        @endif
                                    </h5>
                                    <p class="list-group-item-text">{{ $post->message }}</p>
                                    <p class="list-group-item-text">{{ $post->created_at->diffForHumans() }}</p>
                                    <a href="{{ route('comments.show', $post->id ) }}">

                                        @if (App\Wall::comments_count($post->id) == 0)
                                            comentar
                                        @elseif(App\Wall::comments_count($post->id) == 1)
                                            {{ App\Wall::comments_count($post->id) }} comentario
                                        @else
                                            {{ App\Wall::comments_count($post->id) }} comentarios    
                                        @endif
                                    </a>
                                </a>
                            </div>
                            @endforeach --}}
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
                        <li class="media">
                            <div class="pull-left">
                                @foreach ($pets as $pet)
                                    <a href="#">
                                    <img width="98" height="98" src="{{ Storage::url($pet->photo) }}">
                                </a>
                                @endforeach
                                
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
