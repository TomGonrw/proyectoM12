<?php

namespace App\Http\Controllers;

use App\Models\UF;
use Illuminate\Http\Request;

class ModulUfsController extends Controller
{

    public function index()
    {
        $ufs = UF::all();

    }

}
