<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeliculaController extends Controller
{
    public function index()
    {
        return view('peliculas.index', [
            'peliculas' => Pelicula::with('actor')->get(),
        ]);
    }

    public function create()
    {
        return view('peliculas.create', [
            'actores' => Actor::all(),
        ]);
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        if ($request->has('imagen')) {
            $imagenRuta = Storage::putFile('imagenes', $request->file('imagen'));
            $datos = array_merge($request->all(), ['imagen' => $imagenRuta]);
        }

        Pelicula::create( $datos );

        return redirect()->route('peliculas.index');
    }

    public function edit(Pelicula $peli)
    {
        return view('peliculas.edit', [
            'pelicula' => $peli,
            'actores' => Actor::all(),
        ]);
    }

    public function update(Request $request, Pelicula $peli)
    {
        $datos = $request->all();

        if ($request->has('imagen')) {
            $imagenRuta = Storage::putFile('imagenes', $request->file('imagen'));
            $datos = array_merge($request->all(), ['imagen' => $imagenRuta]);
        }

        $peli->fill( $datos );
        $peli->save();

        return redirect()->route('peliculas.index');
    }

    public function destroy(Pelicula $peli)
    {
        $peli->delete();

        return redirect()->route('peliculas.index');
    }
}
