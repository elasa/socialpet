@extends('layouts.layout')

@section('content')
<h3>Editar Publicación</h3>
<div class="col-lg-6 col-lg-offet-1">
	<form action="{{ route('main.update', $publication->id ) }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('put') }}
		<div class="form-group">
			<input type="text" name="message" value="{{ $publication->message }}" class="form-control" {{ old('message') }}>
		</div>
		<div class="form-group">
			@if ($publication->image == "has not image" || $publication->image == null)
				Agrega una imagen
				<i class="fa fa-camera-retro fa-lg" onclick="document.getElementById('file').click();"></i>
            	<input type="file" name="image" style="display:none;" id="file" />
			@else
				<img width="100%" height="100%" src="{{ Storage::url($publication->image) }}">	
				<i class="fa fa-camera-retro fa-lg" onclick="document.getElementById('file').click();"></i>
            	<input type="file" name="image" style="display:none;" id="file" />
			@endif
		</div>
<button type="submit" class="btn btn-primary">Editar</button>
<a href="/"><button type="button" class="btn btn-danger">Volver</button></a>
</form>
</div>
@endsection