<?php

namespace App\Models;

use App\Models\Resa;
use App\Models\Horaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Horaire_decoupe extends Model
{
    use HasFactory;

    protected $fillable = [
        'start',
        'end',
        'horaire_id',
    ];

    public function horaire()
    {
        return $this->belongsTo(Horaire::class);
    }

    public function resas()
    {
        return $this->belongsToMany(Resa::class);
    }
}
