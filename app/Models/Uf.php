<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uf extends Model
{
    use HasFactory;

    public function alumnes() {
        return $this->belongsToMany(Alumne::class, 'notas')->withPivot('nota');
    }

    public function moduls() {
        return $this->belongsTo(Modul::class, 'id_moduls');
    }
}