<?php

namespace App\Models;

use App\Models\Horaire_decoupe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resa extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'places',
        'horaire_decoupes_id',
    ];

    public function horaire_decoupes()
    {
        return $this->belongsTo(Horaire_decoupe::class);
    }
}
