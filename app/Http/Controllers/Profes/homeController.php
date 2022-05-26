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
use Mail;

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

        $id_cicle = $id;

        return view('profe.menu.alumnes',compact('idalumn','id_cicle'));
    }

    public function alumneSol($id,$id_ciclce)
    {
         
        $alumn = DB::table("alumnes")
        ->where("id","=", $id)
        ->first();
        
        $alumne = Alumne::find($id);

        $modul = DB::table('moduls')->where('id_cicles', $alumne->id_cicles)->get();
        
        $id_cicles = $id_ciclce;

        return view('profe.menu.alumnesol',compact('alumn', 'alumne', 'modul', 'id_cicles'));
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
        $id_modul = $id;
        $id_cicle = $id_cicles;
        return view('profe.menu.inserirnotas',compact('alumne','uf','x','id_modul','id_cicle'));
    }



    public function insnotas(Request $request,$id,$id_modul,$id_cicle){
      
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
                if (isset($request->comentaris)){
                    $notaalu->comentaris = $request->comentaris;
                } else{
                    $notaalu->comentaris = "No hay comentarios";
                }
                $notaalu ->save();
            } else {
                $notaalu = new Nota;
                $notaalu->alumne_id = $id;
                $notaalu->uf_id = $uf;
                $notaalu->nota = $nota; 
                if (isset($request->comentaris)){
                    $notaalu->comentaris = $request->comentaris;
                } else{
                    $notaalu->comentaris = "No hay comentarios";
                }
                $notaalu ->save(); 
            }
      
        }

        return redirect()->route('inserirNotasAl',["id"=>$id_modul,"id_cicles"=>$id_cicle]);
    }


    public function  veurenotesmodul($id) {

        $cicle = Cicle::findOrFail($id);

        $modul = Modul::where('id_cicles', $id)->get();

        $alumnes = Alumne::where('id_cicles', $id)->get();

        
        return view('profe.menu.notasmodul', compact('alumnes', 'modul', 'cicle'));
    }
    
    public function emailpdf()
    {
        $data["email"] = "talmonte@inscamidemar.cat";
        $data["title"] = "From ItSolutionStuff.com";
        $data["body"] = "This is Demo";

        $pdf = PDF::loadView('profe.menu.notapdf', $data);
  
        Mail::send('profe.menu.notapdf', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "text.pdf");
        });
  
        dd('Mail sent successfully');
    }


}

