<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaFavoritoController extends Controller
{
    public function set()
    {
        $id = request()->pelicula_id;

        $pelicula = Pelicula::find( $id );

        $pelicula->favorito = !$pelicula->favorito;

        $pelicula->save();

        return [
            'data' =>[
                
               'id'=> request()->pelicula_id,
               'msg'=> 'La pelicula fue '.($pelicula->favorito ? '':'des').'marcada como favorita'
               ]
        ];
    }
}
