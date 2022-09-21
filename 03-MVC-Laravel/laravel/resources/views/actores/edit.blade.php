@extends('master')

@section('body')

	<form action="{{ route('actores.update', $actor) }}" method="post">
		@csrf
		@method('PUT')

		<label for="nombre">nombre</label>
		<input name="nombre" id="nombre" type="text" placeholder="nombre" value="{{ $actor->nombre }}">

		<label for="fechaNacimiento">fechaNacimiento</label>
		<input name="fechaNacimiento" id="fechaNacimiento" type="date" value="{{ $actor->fechaNacimiento->format('Y-m-d') }}">

		<button type="submit">Guardar</button>
	</form>

@endsection
