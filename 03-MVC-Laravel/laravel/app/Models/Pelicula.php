<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function actor()
    {
        return $this->belongsTo(Actor::class, 'ActorPrincipalID', 'id')->withTrashed();
    }
}
