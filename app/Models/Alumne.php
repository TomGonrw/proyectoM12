<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumne extends Model
{
    use HasFactory;

    public function ufs() {
        return $this->belongsToMany(Uf::class, 'notas')->withPivot('nota');
    }

    public function cicles() {
        return $this->belongsTo(Cicle::class, 'id_cicles');
    }
}