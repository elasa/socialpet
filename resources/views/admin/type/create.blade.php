@extends('layouts.layout')

@section('content')
	<h3>Nuevo tipo de mascota</h3>
	<div class="col-lg-6 col-lg-offet-1">
		<form action="{{ route('types.store') }}" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<input type="text" name="name" class="form-control" placeholder="Ingrese tipo de mascota" value="{{ old('name') }}">
			</div>
			<div class="form-group">
			<button type="submit" class="btn btn-primary">Guardar</button>
			<a href="{{ route('types.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
		</form>
	</div>

@endsection 