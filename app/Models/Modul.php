<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory;

    public function cicle() {
        return $this->belongsTo(Cicle::class, 'id_cicles');
    }

    public function users() {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function ufs() {
        return $this->hasMany(Uf::class, 'id_moduls');
    }
}