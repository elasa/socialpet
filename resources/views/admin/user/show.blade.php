@extends('layouts.layout')

@section('content')

	<h1>{{ $user->name }}</h1>
	
	<img width="150	" src="{{ Storage::url($user->avatar) }}" alt=""><br><br>
	<a href="{{ route('users.index') }}"><button type="button" class="btn btn-primary">Volver</button></a>

@endsection