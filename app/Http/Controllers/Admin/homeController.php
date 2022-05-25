<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modul;
use App\Models\Cicle;
use App\Models\User;
use App\Models\Uf;
use App\Models\Alumne;
use Illuminate\Support\Facades\Hash;



class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function comprobarusuario($id)
    {
        $usu = User::find($id);
        
        
        if($usu->NuevaPassword == 0){
            dump("hola2");
            return view("auth.nuevouspas",compact('usu'));
        }else{
            dump("hola");
            return view("admin.users.index");
        }
    }


    public function AnuevaPass(Request $request,$id){
        echo ($request->contra);
        $usu = User::find($id);
        $usu->password = Hash::make($request->contra);
        $usu->NuevaPassword = 1;
        $usu->save();

        dump("hola3");
        return redirect('/home_inicio');

    }

    

    public function index()
    {
        return view("admin.users.index");
    }

    public function usuarios()
    {
        $usu = DB::table('users') -> get();
        return view('admin.users.usuarios', ['usu'=>$usu]);

    }

    public function ciclos()
    {
        
        $ciclo = DB::table('cicles') -> get();
        return view('admin.users.ciclos', ['ciclo'=>$ciclo]);

    }

    public function grupos()
    {
        $grupos = Modul::all();
        return view('admin.users.grupos',compact('grupos'));

    }
    

    public function ufs()
    {
        $ufs = Uf::all();
        return view('admin.users.ufs',compact('ufs'));

    }

    public function alumnes()
    {
        $alumnes = Alumne::all();
        return view('admin.users.alumnes', ['alumnes'=>$alumnes]);

    }

    public function inserir()
    {
        return view("admin.users.inserir");

    }

    public function inserirc()
    {
        return view("admin.users.inserircicles");

    }
    
    public function inserirg()
    {
        $grupos = Modul::all();
        $cicles = Cicle::all();
        $users = User::all();

        return view("admin.users.inserirgr", compact('grupos','cicles','users'));

    }

    public function inseriru()
    {
        $ufs = Uf::all();
        $moduls = Modul::all();
        return view("admin.users.inseriruf", compact('ufs','moduls'));

    }

    public function inserira()
    {
        $alumne = DB::table('alumnes') -> get();
        $cicles = Cicle::all();
        return view("admin.users.inseriral", compact('alumne','cicles'));

    }
    


    public function inserirUsu(Request $usu)
    {
        $nom = $usu->nom;
        $email = $usu->email;
        $pass = Hash::make($usu->contra);
        $admin = $usu->admin;

        DB::insert("INSERT INTO `users` (`name`, `email`, `password`, `Admin`) VALUES ('$nom', '$email', '$pass', '$admin')");
        return redirect()->route('vistaUsers');
    }


    public function inserirCi(Request $usu)
    {
        $nom = $usu->nom;
        $observacions = $usu->observacions;
     

        DB::insert("INSERT INTO `cicles` (`observacions`, `nom`) VALUES ('$observacions', '$nom')");
        return redirect()->route('vistaUsers2');
    }

    public function inserirgr(Request $usu)
    {
        $nom = $usu->nom;
        $cicle = $usu->cicle;
        $users = $usu->users;

        DB::insert("INSERT INTO `moduls` (`nom`, `id_cicles`, `id_users`) VALUES ('$nom', '$cicle', '$users')");
        return redirect()->route('vistaUsers3');
    }

    public function inseriruf(Request $usu)
    {
        $nom = $usu->nom;
        $hores = $usu->horas;
        $modul = $usu->modul;

        DB::insert("INSERT INTO `ufs` (`nom`, `id_moduls`,`horas`) VALUES ('$nom', '$modul','$hores')");
        return redirect()->route('vistaUsers4');
    }

    public function inseriral(Request $usu)
    {
        $nom = $usu->nom;
        $cicle = $usu->cicle;
        $cognom = $usu->cognom;
        $dni = $usu->dni;
        $correu = $usu->correu;
        $direccio = $usu->direccio;


        DB::insert("INSERT INTO `alumnes` (`nom`, `id_cicles`,`cognom`,`dni`,`correu`,`direccio`) VALUES ('$nom', '$cicle','$cognom','$dni','$correu','$direccio')");
        return redirect()->route('vistaUsers5');
    }



    public function eliminarusu($id){
        dump($id);
        DB::table('users')->where('id',$id)
        ->delete();
        return redirect()->route('vistaUsers');
        
    }

    public function eliminarciclo($id){
        dump($id);
        DB::table('cicles')->where('id',$id)
        ->delete();
        return redirect()->route('vistaUsers2');
        
    }

    public function eliminargrupo($id){
        dump($id);
        DB::table('moduls')->where('id',$id)
        ->delete();
        return redirect()->route('vistaUsers3');
        
    }
  

    public function eliminaruf($id){
        dump($id);
        DB::table('ufs')->where('id',$id)
        ->delete();
        return redirect()->route('vistaUsers4');

    }
   
    
    public function eliminaralumne($id){
        dump($id);
        DB::table('alumnes')->where('id',$id)
        ->delete();
        return redirect()->route('vistaUsers5');

    }


    //UPDATES

    public function updategr(Request $request,$id){
        $modul = Modul::find($id);
        $cicles = Cicle::all();
        $users = User::all();

        return view("admin.users.ugrupo", compact('modul','cicles','users'));
    }

      
    public function updategrupo(Request $request, $id){
        $modulo = Modul::find($id);
        $modulo->nom = $request->nom;
        $modulo->id_cicles = $request->Cicle;
        $modulo->id_users = $request->Usuari;
        $modulo->save();

        return redirect()->route('vistaUsers3');
    }

    public function updateuf(Request $request,$id){
        $uf = Uf::find($id);
        $moduls = Modul::all();

        return view("admin.users.edituf", compact('uf','moduls'));
    }

    public function updateufs(Request $request, $id){
        $uf = Uf::find($id);
        $uf->nom = $request->nom;
        $uf->id_moduls = $request->modul;
        $uf->horas = $request->horas;
        $uf->save();

        return redirect()->route('vistaUsers4');
    }

    public function ucicle(Request $request,$id){
        $cicle = Cicle::find($id);

        return view("admin.users.ucicle", compact('cicle'));
    }

    public function editarcicle(Request $request, $id){
        $cicle = Cicle::find($id);
        $cicle->nom = $request->nom;
        $cicle->observacions = $request->observacions;
        $cicle->save();

        return redirect()->route('vistaUsers2');
    }

    public function uuser(Request $request,$id){
        $user = User::find($id);
        return view("admin.users.euser", compact('user'));
    }

    public function euser(Request $request, $id){
        $User = User::find($id);
        $User->name = $request->nom;
        $User->email = $request->email;
        $User->password = Hash::make($request->password);
        
        $User->save();

        return redirect()->route('vistaUsers');
    }

    public function ealumne(Request $request,$id){
        $alumne = Alumne::find($id);
        $cicles = Cicle::all();
        $users = User::all();

        return view("admin.users.ealumnes", compact('alumne','cicles','users'));
    }

    public function upalumne(Request $request, $id){
        $alumne = Alumne::find($id);
        $alumne->nom = $request->nom;
        $alumne->id_cicles = $request->cicle;
        $alumne->cognom = $request->cognom;
        $alumne->dni = $request->dni;
        $alumne->correu = $request->correu;
        $alumne->direccio = $request->direccio;

        
        $alumne->save();

        return redirect()->route('vistaUsers5');
    }
}