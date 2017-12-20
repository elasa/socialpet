@extends('layouts.layout')

@section('content')
	<img width="50	" height="50" src="{{ Storage::url($pet->photo) }}" alt="">
	<h1>{{ $pet->name }}</h1>

	<a href="{{ route('pets.index') }}"><button type="button" class="btn btn-primary">Volver</button></a>

@endsection