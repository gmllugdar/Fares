<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Pelicula;
use Illuminate\Http\Request;

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
        // dd($request->all());
        Pelicula::create( $request->all() );

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
        $peli->fill( $request->all() );
        $peli->save();

        return redirect()->route('peliculas.index');
    }

    public function destroy(Pelicula $peli)
    {
        $peli->delete();

        return redirect()->route('peliculas.index');
    }
}
