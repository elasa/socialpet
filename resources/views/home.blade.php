@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('profile.index')}}" class="btn btn-primary" aria-label="Left Align">
                        <i class="fa fa-user fa" aria-hidden="true"></i>
                    </a> Mi perfil <br><br>
                    <a href="{{ route('pets.create')}}" class="btn btn-primary" aria-label="Left Align">
                        <i class="fa fa-paw fa-lg" aria-hidden="true"></i>
                    </a> Agregar una Mascota <br><br>
                    <a href="/wall" class="btn btn-primary" aria-label="Left Align">
                       <i class="fa fa-th fa-lg" aria-hidden="true"></i>
                    </a> Mi muro <br><br>

                    Ya has iniciado session!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
