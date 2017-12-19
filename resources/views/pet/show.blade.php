@extends('layouts.layout')

@section('content')

	<h1>{{ $pet->name }}</h1>

	<a href="{{ route('pets.index') }}"><button type="button" class="btn btn-primary">Volver</button></a>

@endsection