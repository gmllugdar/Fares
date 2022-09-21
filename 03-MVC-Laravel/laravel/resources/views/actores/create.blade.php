@extends('master')

@section('body')

	<form action="{{ route('actores.store') }}" method="post">
		@csrf

		<label for="nombre">nombre</label>
		<input name="nombre" id="nombre" type="text" placeholder="nombre">

		<label for="fechaNacimiento">fechaNacimiento</label>
		<input name="fechaNacimiento" id="fechaNacimiento" type="date">

		<button type="submit">Guardar</button>
	</form>

@endsection
