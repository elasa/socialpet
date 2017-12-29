@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    @if (starts_with($publication->avatar, 'http://') || starts_with($publication->avatar, 'https://'))   
                        <img width="32px" height="32px" src="{{ $publication->avatar }}">
                    @else
                        <img width="32px" height="32px" src="{{ Storage::url($publication->avatar) }}">
                    @endif
                    {{ $publication->name }}
                </div><br>
                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="panel panel-info">
                        <div class="panel-heading">Comentar Publicacion...</div>

                        <div class="panel-body"> 
                                    
                            <div class="list-group">
                              <a href="#" class="list-group-item ">
                                <h5 class="list-group-item-heading"> publicado por <b> {{ $publication->name }}</b> </h5>
                                <p class="list-group-item-text">{{ $publication->message }}</p>
                                <p class="list-group-item-text">{{ $publication->created_at->diffForHumans() }}</p>
                                <a href="#">{{ $count_comments }}</a> comentarios
                            </a>
                        </div>

                        <form action="{{ route('comments.store') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $publication->id }}">
                            <div class="form-group">
                                <textarea name="message" cols="" rows="3" class="form-control" placeholder="Escribe un comentario aqui...">{{ old('message') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Comentar</button>
                            <a href="/"><button type="button" class="btn btn-info">Volver</button></a>
                        </form>
                        <br>
                        @foreach ($comments as  $comment)
                            <div class="list-group">
                                <div class="list-group-item "> 
                                    <h5 class="list-group-item-heading">
                                        @if ($comment->user_id == Auth::user()->id)
                                            @if (starts_with($comment->avatar, 'http://') || starts_with($comment->avatar, 'https://'))   
                                                <img width="32px" height="32px" src="{{ $comment->avatar }}">
                                            @else
                                                <img width="32px" height="32px" src="{{ Storage::url($comment->avatar) }}">
                                            @endif
                                        @else
                                            @if (starts_with($comment->avatar, 'http://') || starts_with($comment->avatar, 'https://'))   
                                                <img width="32px" height="32px" src="{{ $comment->avatar }}">
                                            @else
                                                <img width="32px" height="32px" src="{{ Storage::url($comment->avatar) }}">
                                            @endif
                                        @endif
                                        {{ $comment->name }}
                                    </h5>
                                    {{ $comment->message }}
                                    <p class="text-gray-dark"><br><em><font size="2">{{ $comment->created_at->diffForHumans() }}</font></em></p>
                                    <p class="list-group-item-text pull-right">
                                    @if ($comment->user_id == Auth::user()->id)
                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button class="btn btn-link" role="link" type="submit">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    @endif
                                    </p>
                                </div>
                            </div>
                            {{-- @if ($comment->user_id==$user_id)
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="post"" class="float-right">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button class="btn btn-link" role="link" type="submit">eliminar</button>
                            </form>
                            @endif --}}
                        @endforeach
                        {{ $comments->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
