@extends('master')

@section('body')

	<a href="{{ route('peliculas.create') }}">Nueva pelicula</a>

	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Año</th>
				<th>Titulo</th>
				<th>Duración</th>
				<th>Sinopsis</th>
				<th>Imagen</th>
				<th>ActorPrincipal</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($peliculas as $x)
				<tr>
					<td>{{ $x->id }}</td>
					<td>{{ $x->año }}</td>
					<td>{{ $x->titulo }}</td>
					<td>{{ $x->duración }}</td>
					<td>{{ $x->sinopsis }}</td>
					<td>{{ $x->imagen }}</td>
					<td>{{ $x->actor->nombre }}</td>
					{{-- <td>{{ $x->actor ? $x->actor->nombre : '' }}</td> --}}
					<td>
						<a href="{{ route('peliculas.edit', $x) }}">Editar</a>
						<form action="{{ route('peliculas.destroy', $x) }}" method="post" onsubmit="return confirm('Borrar?')">
							@csrf
							@method('DELETE')
							<button class="btn">Eliminar</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection
