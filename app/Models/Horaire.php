<?php

namespace App\Models;

use App\Models\Horaire_decoupe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Horaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'start',
        'end',
        'places',
    ];

    public function horaire_decoupes()
    {
        return $this->hasMany(Horaire_decoupe::class);
    }
}
