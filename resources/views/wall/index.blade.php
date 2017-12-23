@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">El Muro</div><br>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;
                    <img width="32px" height="32px" src="{{ Storage::url($avatar) }}" alt="">
                    <b>{{ $user }}</b>
                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="panel panel-info">
                        <form action="{{ route('publications.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <textarea name="message" cols="" rows="3" class="form-control" placeholder="¿Que estás pensando, {{ Auth::user()->name }}?">{{ old('message') }}</textarea>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="is_public"  value="NO" checked>
                                    No Publico
                                </label>
                                <label>
                                    <input type="radio" name="is_public"  value="SI">
                                    Publico
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Publicar</button>
                            <a href="/wall"><button type="button" class="btn btn-danger">Cancelar</button></a>
                        </form>
                        <div class="panel-body"> 
                            @foreach ($publications as $publication)
                                @if ($publication->message != 'Esta es mi primera publicacion que debo ocultar')
                                    <div class="list-group">
                                        <a href="#" class="list-group-item "> 
                                            <h5 class="list-group-item-heading">
                                                <img width="32px" height="32px" src="{{ Storage::url($avatar) }}"> 

                                                @if ($user ==  null)
                                                    {{ $email }}
                                                @else
                                                    {{ $user }}
                                                @endif
                                            </h5>
                                            <p class="list-group-item-text">{{ $publication->message }}</p>
                                            <p class="list-group-item-text">{{ $publication->created_at->diffForHumans() }}</p>
                                            <a href="{{ route('comments.show', $publication->id) }}">
                                                @if (App\Wall::comments_count($publication->id) == 0)
                                                comentar
                                                @elseif(App\Wall::comments_count($publication->id) == 1)
                                                {{ App\Wall::comments_count($publication->id) }} comentario
                                                @else
                                                {{ App\Wall::comments_count($publication->id) }} comentarios    
                                                @endif
                                                <a href="{{ route('wall.id', $publication->id ) }}" class="pull-right">

                                                    @if ($publication->is_public=="SI")
                                                        publicado
                                                    @else
                                                        publicar
                                                    @endif  
                                                </a>
                                            </a>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
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
