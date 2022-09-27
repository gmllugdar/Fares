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
		<br>
		<label for="imagen">imagen</label>

		<input name="imagen" id="imagen" type="file" accept="image/png, image/gif, image/jpeg">
		<div id="drop" ondrop="dropHandler(event)" ondragover="event.preventDefault()">
			<img id="image" src="" alt="img">
			
		</div>
		<br>
		<label for="ActorPrincipalID">ActorPrincipalID</label>
		<select name="ActorPrincipalID" id="ActorPrincipalID">
			@foreach ($actores as $actor)
				<option value="{{ $actor->id }}" {{ $pelicula->actor->id == $actor->id ? 'selected' : '' }}>{{ $actor->nombre }}</option>
			@endforeach
		</select>

		<button type="submit">Guardar</button>
	</form>
<style>
	#drop{ width:200px; border: 3px dashed red ; height: 200px; }
</style>
<script>
	 let image = document.getElementById('image');
	 let imageinput = document.getElementById('imagen');
	 function dropHandler(ev) {
  
  ev.preventDefault();
  

	let file = ev.dataTransfer.items[0].getAsFile()
	console.log("datos:  ",file.name)
	const readfile = new FileReader()
	readfile.readAsDataURL(file)
	readfile.onloadend= function(){
		image.src= this.result;
		
	}
	const dt = new DataTransfer()
	dt.items.add(file)
	imageinput.files=dt.files
	
	
		
}
</script>
@endsection
