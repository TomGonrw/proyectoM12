<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cicle extends Model
{
    use HasFactory;

    public function alumnes() {
        return $this->hasMany(Alumne::class, 'id');
    }

    public function moduls() {
        return $this->hasMany(Modul::class, 'id');
    }
}