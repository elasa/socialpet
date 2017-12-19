@extends('layouts.layout')

@section('content')
<h3>Editar Usuario</h3>

<div class="col-lg-6 col-lg-offet-1">
	<div class="row">
		<div class="col-xs-6 col-md-4">
			<div class="thumbnail">
				<img width="200" src="{{ Storage::url($user->avatar ) }}" alt="">
			</div>	
		</div>
		<br><br>Foto de perfil
	</div>
	<form action="{{ route('users.update', $user->id ) }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('put') }}
		<div class="form-group">
			<input type="text" name="name" value="{{ $user->name }}" class="form-control" {{ old('name') }}>
		</div>
		<div class="form-group">
			<select name="role_id" class="form-control">
				@foreach ($roles as $role)
				@if ($role->id == $user->role->id)
				<option value="{{ $role->id }}" selected>{{ $role->name }}</option>
				@else
				<option value="{{ $role->id }}">{{ $role->name }}</option>
				@endif
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<input type="text" name="email" value="{{ $user->email }}" class="form-control" {{ old('email') }}>
		</div>
		<div class="form-group">
			<input type="password" name="password" value="{{ old('password') }}" class="form-control">
		</div>
		<div class="form-group">
				<input type="file" name="avatar" class="form-control">
		</div>
<button type="submit" class="btn btn-primary">Editar</button>
<a href="{{ route('users.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
</form>
</div>
@endsection