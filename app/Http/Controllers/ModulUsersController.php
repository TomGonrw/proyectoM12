<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use Illuminate\Http\Request;

class ModulUsersController extends Controller
{

    public function index()
    {
        $moduls = Modul::users();
    }
}
