@extends('master')

@section('body')

	<form action="{{ route('peliculas.store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<label for="año">año</label>
		<input name="año" id="año" type="text" placeholder="año">

		<label for="titulo">titulo</label>
		<input name="titulo" id="titulo" type="text" placeholder="titulo">

		<label for="duracion">duracion</label>
		<input name="duracion" id="duracion" type="number" placeholder="duracion">

		<label for="sinopsis">sinopsis</label>
		<input name="sinopsis" id="sinopsis" type="text" placeholder="sinopsis">

		<label for="imagen">imagen</label>
		<input name="imagen" id="imagen" type="file" accept="image/png, image/gif, image/jpeg">

		<label for="ActorPrincipalID">ActorPrincipalID</label>
		<select name="ActorPrincipalID" id="ActorPrincipalID">
			@foreach ($actores as $actor)
				<option value="{{ $actor->id }}">{{ $actor->nombre }}</option>
			@endforeach
		</select>

		<button type="submit">Guardar</button>
	</form>

@endsection
