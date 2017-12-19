@extends('layouts.layout')

@section('content')
<h3>Editar tipo de mascotas</h3>
<div class="col-lg-6 col-lg-offet-1">
	<form action="{{ route('types.update', $type->id ) }}" method="POST">
		{{ csrf_field() }}
		{{ method_field('put') }}
		<div class="form-group">
			<input type="text" name="name" value="{{ $type->name }}" class="form-control" {{ old('name') }}>
		</div>
<button type="submit" class="btn btn-primary">Editar</button>
<a href="{{ route('types.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
</form>
</div>
@endsection