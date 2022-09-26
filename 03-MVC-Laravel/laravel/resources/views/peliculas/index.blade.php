@extends('master')

@section('body')

	<input list="movies" id="search" type="text" class="form-control" placeholder="Buscar pelicula...">
	<datalist id="movies"></datalist>

	<a href="{{ route('peliculas.create') }}">Nueva pelicula</a>

	<table class="table">
		<thead>
			<tr>
				<th>fav</th>
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
					<td>
						<input
							type="checkbox"
							id="pelicula_{{ $x->id }}"
							data-id="{{ $x->id }}"
							{{ $x->favorito ? 'checked' : '' }}
							>
					</td>
					<td>{{ $x->id }}</td>
					<td>{{ $x->año }}</td>
					<td>{{ $x->titulo }}</td>
					<td>{{ $x->duración }}</td>
					<td>{{ $x->sinopsis }}</td>
					<td>
						@if($x->imagen)
							<img class="img-thumbnail" src="{{ asset($x->imagen) }}">
						@endif
					</td>
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

<script>
	$('input[type=checkbox]').on('change', function (event) {
		// console.log($(this).attr('id'));
		$.ajax({
			method: 'post',
			url: "{{ route('api.favorito') }}",
			data: {
				pelicula_id: $(this).attr('data-id'),
				_token: "{{ csrf_token() }}"
			},
			success: function(data){
				console.log(data)
			}
		})
	})
</script>

<script>
	let keyupTimer;
	$('#search').on('keypress', function (event) {
		let searchText = $(this);
        clearTimeout(keyupTimer);
        keyupTimer = setTimeout(function () {
			$.get({
				url: "{{ route('api.search') }}",
				data: {
					q: searchText.val(),
				},
				success: function(data){
					console.log(data);
					let moviesHtml = data.map( x => `<option value="${x.titulo}">` );
					$('#movies').html(moviesHtml);
				}
			})
        }, 800);

	})
</script>
@endsection
