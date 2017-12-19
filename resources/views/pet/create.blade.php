@extends('layouts.layout')

@section('content')
	<h3>Nueva mascota</h3>
	<div class="col-lg-6 col-lg-offet-1">
		<form action="{{ route('pets.store') }}" method="POST">
			{{ csrf_field() }}
			<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
			<div class="form-group">
				<select name="type_id" class="form-control">
					@foreach ($types as $type)
						<option value="{{ $type->id }}">{{ $type->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<input type="text" name="name" class="form-control" placeholder="Ingrese nombre" value="{{ old('name') }}">
			</div>
			
			<div class="form-group">
				<input type="text" name="age" class="form-control" placeholder="Ingrese Edad" value="{{ old('age') }}">
			</div>
			<div class="form-group">
				<input type="text" name="color" class="form-control" placeholder="Ingrese Color" value="{{ old('color') }}">
			</div>
			<div class="form-group">
				<textarea name="description" cols="50" rows="10" class="form-control">{{ old('description') }}</textarea>
			</div>
			<div class="form-group">
				<input type="text" name="photo" class="form-control" placeholder="Ingrese Photo" value="{{ old('photo') }}">
			</div>
			<button type="submit" class="btn btn-primary">Guardar</button>
			<a href="{{ route('pets.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
		</form>
	</div>

@endsection