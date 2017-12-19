@extends('layouts.layout')

@section('content')

	<h3>Tipos de mascota</h3>
	<a href="{{ route('types.create') }}" class="btn btn-success">Nuevo</a><br><br>
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
					@foreach ($types as $type)
						<tr>
						<td><a href="{{ route('types.show',$type->id) }}">{{ $type->name}}</a></td>
							<td>{{ $type->created_at }}</td>
							<td>{{ $type->updated_at }}</td>
							<td>
									<a href="{{ route('types.edit',$type->id) }}" class="btn btn-info btn-sm float-right">Editar</a>
							</td>
							<td>
								<form action="{{ route('types.destroy',$type->id) }}" method="post"" class="float-right">
									{{ csrf_field() }}
									{{ method_field('delete') }}
									<input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{{ $types->render() }}
@endsection


