@extends('layouts.layout')

@section('content')

	<h3>Mis Mascotas</h3>
	<a href="{{ route('pets.create') }}" class="btn btn-success">Nuevo</a><br><br>
			<table class="table table-hover table-responsive table-striped">
				<thead>
					<tr>
						<th>Usuario</th>
						<th>Tipo Mascota</th>
						<th>Nombre</th>
						<th>Edad</th>
						<th>Color</th>
						<th>Descripción</th>
						<th>Foto</th>
						<th>Creado</th>
						<th>Actualizado</th>
						<th colspan="2">Operaciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($pets as $pet)
						<tr>
							<td>{{ $pet->user->name }}</td>
							<td>{{ $pet->type->name }}</td>
							<td><a href="{{ route('pets.show',$pet->id) }}">{{ $pet->name}}</a></td>
							<td>{{ $pet->age }}</td>
							<td>{{ $pet->color }}</td>
							<td>{{ $pet->description }}</td>
							<td>{{ $pet->photo }}</td>
							<td>{{ $pet->created_at }}</td>
							<td>{{ $pet->updated_at }}</td>
							<td>
									<a href="{{ route('pets.edit',$pet->id) }}" class="btn btn-info btn-sm float-right">Editar</a>
							</td>
							<td>
								<form action="{{ route('pets.destroy',$pet->id) }}" method="post"" class="float-right">
									{{ csrf_field() }}
									{{ method_field('delete') }}
									<input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{{ $pets->render() }}
@endsection


