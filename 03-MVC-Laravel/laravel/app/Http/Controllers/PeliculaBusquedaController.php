<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaBusquedaController extends Controller
{
    public function search(Request $request)
    {
        return Pelicula::where('titulo', 'LIKE', "%{$request->q}%")->select(['id', 'titulo'])->get();
    }
}
