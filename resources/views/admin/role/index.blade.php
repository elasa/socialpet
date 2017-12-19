@extends('layouts.layout')

@section('content')

	<h3>Roles de Usuario</h3>
	<a href="{{ route('roles.create') }}" class="btn btn-success">Nuevo</a><br><br>
			<table class="table table-hover table-responsive table-striped">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Creado</th>
						<th>Actualizado</th>
						<th colspan="2">Operaciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($roles as $role)
						<tr>
						<td><a href="{{ route('roles.show',$role->id) }}">{{ $role->name}}</a></td>
							<td>{{ $role->created_at }}</td>
							<td>{{ $role->updated_at }}</td>
							<td>
									<a href="{{ route('roles.edit',$role->id) }}" class="btn btn-info btn-sm float-right">Editar</a>
							</td>
							<td>
								<form action="{{ route('roles.destroy',$role->id) }}" method="post"" class="float-right">
									{{ csrf_field() }}
									{{ method_field('delete') }}
									<input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{{ $roles->render() }}
@endsection


