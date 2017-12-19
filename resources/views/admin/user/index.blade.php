@extends('layouts.layout')

@section('content')

	<h3>Usuarios</h3>
	<a href="{{ route('users.create') }}" class="btn btn-success">Nuevo</a><br><br>
			<table class="table table-hover table-responsive table-striped">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Rol</th>
						<th>E-Mail</th>
						<th>Creado</th>
						<th>Actualizado</th>
						<th colspan="2">Operaciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
						<tr>
						<td><a href="{{ route('users.show',$user->id) }}">{{ $user->name}}</a></td>
							<td>{{ $user->role->name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->created_at }}</td>
							<td>{{ $user->updated_at }}</td>
							<td>
									<a href="{{ route('users.edit',$user->id) }}" class="btn btn-info btn-sm float-right">Editar</a>
							</td>
							<td>
								<form action="{{ route('users.destroy',$user->id) }}" method="post"" class="float-right">
									{{ csrf_field() }}
									{{ method_field('delete') }}
									<input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{{ $users->render() }}
@endsection


