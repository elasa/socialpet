@extends('layouts.layout')

@section('content')

	<h1>{{ $role->name }}</h1>

	<a href="{{ route('roles.index') }}"><button type="button" class="btn btn-primary">Volver</button></a>

@endsection