<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actor extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'fechaNacimiento' => 'date',
    ];

    public function peliculas()
    {
        return $this->hasMany(Pelicula::class, 'ActorPrincipalID', 'id');
    }
}
