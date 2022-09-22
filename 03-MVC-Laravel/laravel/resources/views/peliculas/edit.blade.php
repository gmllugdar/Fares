@extends('master')

@section('body')

	<form action="{{ route('peliculas.update', $pelicula) }}" method="post" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<label for="año">año</label>
		<input name="año" id="año" type="text" placeholder="año" value="{{ $pelicula->año }}">

		<label for="titulo">titulo</label>
		<input name="titulo" id="titulo" type="text" placeholder="titulo" value="{{ $pelicula->titulo }}">

		<label for="duracion">duracion</label>
		<input name="duracion" id="duracion" type="number" placeholder="duracion" value="{{ $pelicula->duracion }}">

		<label for="sinopsis">sinopsis</label>
		<input name="sinopsis" id="sinopsis" type="text" placeholder="sinopsis" value="{{ $pelicula->sinopsis }}">

		<label for="imagen">imagen</label>
		<input name="imagen" id="imagen" type="file" accept="image/png, image/gif, image/jpeg">

		<label for="ActorPrincipalID">ActorPrincipalID</label>
		<select name="ActorPrincipalID" id="ActorPrincipalID">
			@foreach ($actores as $actor)
				<option value="{{ $actor->id }}" {{ $pelicula->actor->id == $actor->id ? 'selected' : '' }}>{{ $actor->nombre }}</option>
			@endforeach
		</select>

		<button type="submit">Guardar</button>
	</form>

@endsection
