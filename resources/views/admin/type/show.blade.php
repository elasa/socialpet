@extends('layouts.layout')

@section('content')

	<h1>{{ $type->name }}</h1>

	<a href="{{ route('types.index') }}"><button type="button" class="btn btn-primary">Volver</button></a>

@endsection