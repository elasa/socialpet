@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('pets.create')}}" class="btn btn-default" aria-label="Left Align">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    </a> Mi perfil <br><br>
                    <a href="{{ route('pets.create')}}" class="btn btn-default" aria-label="Left Align">
                        <span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></span>
                    </a> Agregar una Mascota <br><br>
                    <a href="/wall" class="btn btn-default" aria-label="Left Align">
                        <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
                    </a> Mi muro <br><br>

                    Ya has iniciado session!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
