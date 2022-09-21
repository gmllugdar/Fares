<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index()
    {
        return view('actores.index', [
            'actores' => Actor::get(),
        ]);
    }

    public function create()
    {
        return view('actores.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Actor::create( $request->all() );

        return redirect()->route('actores.index');
    }

    public function edit(Actor $actor)
    {
        return view('actores.edit', [
            'actor' => $actor,
        ]);
    }

    public function update(Request $request, Actor $actor)
    {
        $actor->fill( $request->all() );
        $actor->save();

        return redirect()->route('actores.index');
    }

    public function destroy(Actor $actor)
    {
        $actor->delete();

        return redirect()->route('actores.index');
    }
}
