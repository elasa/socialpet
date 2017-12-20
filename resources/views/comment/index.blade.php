@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <img width="32px" height="32px" src="{{ Storage::url($publication->avatar) }}" alt="">
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
                        </form>
                        <br>
                        @foreach ($comments as  $comment)
                            <div class="list-group">
                                <div class="list-group-item "> 
                                    <h5 class="list-group-item-heading">
                                        <img width="32px" height="32px" src="{{ Storage::url($comment->avatar) }}" alt="">
                                        {{ $comment->name }} 
                                    </h5>
                                    <p class="list-group-item-text">{{ $comment->message }}</p>
                                    <p class="list-group-item-text">
                                    <p class="text-info">{{ $comment->created_at->diffForHumans() }}</p>
                                    
                                    {{-- {{ App\Wall::comments_count($post->id) }} --}}
                                    @if ($comment->user_id==$user_id)
                                        {{-- <a href="{{ route('comments.destroy', $comment->id) }}">eliminar</a> --}}
                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="post"" class="float-right">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button class="btn btn-link" role="link" type="submit">eliminar</button>
                                            {{-- <input type="submit" value="Eliminar" class="btn btn-danger btn-sm"> --}}
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
