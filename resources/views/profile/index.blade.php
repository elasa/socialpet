@extends('layouts.layout')

@section('content')

{{-- <h3>Mis Mascotas</h3>
<img width="150	" height="150" src="{{ Storage::url(Auth::user()->avatar) }}" alt=""><br>
{{ Auth::user()->role->name }}
{{ Auth::user()->name }}
{{ Auth::user()->email }} --}}

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel panel-heading">
					Perfil
				</div>
				<div class="panel panel-body">
					<div class="list-group">
						<div align="center"><img width="150	" height="150" src="{{ Storage::url(Auth::user()->avatar) }}" alt=""></div>
						<br>
						<a href="#" class="list-group-item">Nombre: {{ Auth::user()->name }}</a>
						<a href="#" class="list-group-item">E-mail: {{ Auth::user()->email }}</a>
					</div>
				</div>
			</div>
			<div class="panel panel-primary">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('pets.create')}}" class="btn btn-primary" aria-label="Left Align">
                        <i class="fa fa-paw fa-lg" aria-hidden="true"></i>
                    </a> Agregar una Mascota <br><br>
                    <a href="/wall" class="btn btn-primary" aria-label="Left Align">
                       <i class="fa fa-th fa-lg" aria-hidden="true"></i>
                    </a> Mi muro <br><br>
                </div>
            </div>
		</div>
		<div class="col-md-8">
			<div class="panel panel-primary">
				<div class="panel panel-heading">
					Mis mascotas
					<a href="{{ route('pets.create') }}" class="btn btn-success btn-sm pull-right">Nueva mascota</a>
				</div>
				<div class="panel panel-body">
					<div class="list-group">
						@foreach ( $pets as $pet)
							<div class="list-group">
								<a href="#" class="list-group-item">
									<h4 class="list-group-item-heading"> 

									<img width="50	" height="50" src="{{ Storage::url($pet->photo) }}" alt="">
									{{ $pet->name }}</h4>
									<p class="list-group-item-text"></p>
								</a>
							</div>
							<a href="#" class="list-group-item">Edad: {{ $pet->age }}</a>
							<a href="#" class="list-group-item">Color: {{ $pet->color }}</a>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


