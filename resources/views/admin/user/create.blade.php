@extends('layouts.layout')

@section('content')
	<h3>Nuevo usuario</h3>	

	<div class="col-lg-6 col-lg-offet-1">
		<div class="row">
			<div class="col-xs-6 col-md-4">
				<div class="thumbnail">
					<img width="200" src="/storage/default_avatar.jpg" alt="">
				</div>	
			</div>
			<br><br>Foto de perfil
		</div>
		<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				<input type="text" name="name" class="form-control" placeholder="Ingrese nombre" value="{{ old('name') }}">
			</div>
			<div class="form-group">
				<select name="role_id" class="form-control">
					@foreach ($roles as $role)
						<option value="{{ $role->id }}">{{ $role->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<input type="text" name="email" class="form-control" placeholder="Ingrese E-Mail" value="{{ old('email') }}">
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Ingrese Password">
			</div>
			<div class="form-group">
				<input type="password" name="password_confirmation" class="form-control" placeholder="Repita Password">
			</div>
			<div class="form-group">
				<input type="file" name="avatar" class="form-control">
			</div>
			<button type="submit" class="btn btn-primary">Guardar</button>
			<a href="{{ route('users.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
		</form>
	</div>

@endsection