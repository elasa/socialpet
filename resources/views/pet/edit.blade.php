@extends('layouts.layout')

@section('content')
<h3>Editar mi mascota</h3>
<div class="col-lg-6 col-lg-offet-1">
	<form action="{{ route('pets.update', $pet->id ) }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('put') }}
		<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
		<div class="form-group">
			<select name="type_id" class="form-control">
				@foreach ($types as $type)
				@if ($type->id == $pet->type->id)
				<option value="{{ $type->id }}" selected>{{ $type->name }}</option>
				@else
				<option value="{{ $type->id }}">{{ $type->name }}</option>
				@endif
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<input type="text" name="name" class="form-control" placeholder="Ingrese nombre" value="{{ $pet->name }}">
		</div>

		<div class="form-group">
			<input type="text" name="age" class="form-control" placeholder="Ingrese Edad" value="{{ $pet->age }}">
		</div>
		<div class="form-group">
			<input type="text" name="color" class="form-control" placeholder="Ingrese Color" value="{{ $pet->color }}">
		</div>
		<div class="form-group">
			<textarea name="description" cols="50" rows="10" class="form-control">{{ $pet->description }}</textarea>
		</div>
		<div class="form-group">
				<input type="file" name="photo" class="form-control">
			</div>
		<button type="submit" class="btn btn-primary">Guardar</button>
		<a href="{{ route('pets.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
	</form>
</div>
@endsection
