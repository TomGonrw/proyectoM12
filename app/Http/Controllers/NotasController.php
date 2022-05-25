<?php

namespace App\Http\Controllers;

use App\Models\Alumne;
use App\Models\Uf;
use Illuminate\Http\Request;

class NotasController extends Controller
{

    public function mostrarNotas()
    {
        $alumno = Alumne::find(1);
        $modulo = Modul::find(2);
    }

}
