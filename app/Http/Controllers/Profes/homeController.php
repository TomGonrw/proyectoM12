<?php

namespace App\Http\Controllers\Profes;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Alumne;
use App\Models\Uf;
use App\Models\Modul;
use App\Models\User;
use App\Models\Nota;
use App\Models\Cicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeUnit\FunctionUnit;
use PDF;
use App;

class homeController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $moduls = $user->moduls;
        return view('profe.menu.index', compact('user'));
        
        // $user = auth()->user()->id;
        // $usuario = User::find($user);
        // return view('profe.menu.index', ['usuario'=>$usuario]);
    
    }

    public function alumnes($id)
    {
         
        $idalumn = DB::table("alumnes")
        ->where("id_cicles","=", $id)
        ->get();

        return view('profe.menu.alumnes',compact('idalumn'));
    }

    public function alumneSol($id)
    {
         
        $alumn = DB::table("alumnes")
        ->where("id","=", $id)
        ->first();
        
        $alumne = Alumne::find($id);

        $modul = DB::table('moduls')->where('id_cicles', $alumne->id_cicles)->get();
        
        return view('profe.menu.alumnesol',compact('alumn', 'alumne', 'modul'));
    }
    public function pdfs($id)
    {

        $alumn = DB::table("alumnes")
        ->where("id","=", $id)
        ->first();
        
        $alumne = Alumne::find($id);

        $modul = DB::table('moduls')->where('id_cicles', $alumne->id_cicles)->get();

        $data = compact('alumn', 'alumne', 'modul');

        $pdf = PDF::loadView('profe.menu.notapdf', $data);
        return $pdf->download('notas_' . $alumn->nom . '.pdf'); 
    }

 
    public function  inserirnotas($id, $id_cicles) {
        $alumne = Alumne::all();
        $uf = DB::table('ufs')
        ->where('id_moduls','=',$id)
        ->get();
        $alumne = DB::table('alumnes')
        ->where('id_cicles','=',$id_cicles)
        ->get();
        $x = DB::table('ufs')
        ->where('id_moduls','=',$id)
        ->count();
        return view('profe.menu.inserirnotas',compact('alumne','uf','x'));
    }



    public function insnotas(Request $request,$id){
      
        foreach ($request->notes as $uf => $nota){
            $pra = DB::table('notas')
            ->where('alumne_id','=',$id)
            ->where('uf_id','=',$uf)
            ->first();
            if (isset($pra)) {
                $notaalu = Nota::find($pra->id);
                $notaalu->alumne_id = $id;
                $notaalu->uf_id = $uf;
                $notaalu->nota = $nota; 
                $notaalu->comentaris = $request->comentaris;
                $notaalu ->save();
            } else {
                $notaalu = new Nota;
                $notaalu->alumne_id = $id;
                $notaalu->uf_id = $uf;
                $notaalu->nota = $nota; 
                $notaalu->comentaris = $request->comentaris;
                $notaalu ->save(); 
            }
      
        }
        return redirect('/home_inicio');
    }


    public function  veurenotesmodul($id) {

        $cicle = Cicle::findOrFail($id);

        $modul = Modul::where('id_cicles', $id)->get();

        $alumnes = Alumne::where('id_cicles', $id)->get();

        
        return view('profe.menu.notasmodul', compact('alumnes', 'modul', 'cicle'));
    }


}

