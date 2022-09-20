<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function peliculas()
    {
        return $this->hasMany(Pelicula::class, 'ActorPrincipalID', 'id');
    }
}
