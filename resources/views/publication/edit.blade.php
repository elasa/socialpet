@extends('layouts.layout')

@section('content')
<h3>Editar Publicación</h3>
<div class="col-lg-6 col-lg-offet-1">
	<form action="{{ route('main.update', $publication->id ) }}" method="POST">
		{{ csrf_field() }}
		{{ method_field('put') }}
		<div class="form-group">
			<input type="text" name="message" value="{{ $publication->message }}" class="form-control" {{ old('message') }}>
		</div>
<button type="submit" class="btn btn-primary">Editar</button>
<a href="/"><button type="button" class="btn btn-danger">Volver</button></a>
</form>
</div>
@endsection