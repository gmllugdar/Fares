@extends('master')

@section('body')

	<a href="{{ route('actores.create') }}">Nueva actor</a>

	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>F. Nacimiento</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($actores as $actor)
				<tr>
					<td>{{ $actor->id }}</td>
					<td>{{ $actor->nombre }}</td>
					<td>{{ $actor->fechaNacimiento }}</td>
					<td>
						<a href="{{ route('actores.edit', $actor) }}">Editar</a>
						{{-- @if($actor->peliculas->count() == 0) --}}
							<form action="{{ route('actores.destroy', $actor) }}" method="post" onsubmit="return confirm('Borrar?')">
								@csrf
								@method('DELETE')
								<button class="btn">Eliminar</button>
							</form>
						{{-- @endif --}}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection
