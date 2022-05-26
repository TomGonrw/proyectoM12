<?php

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('send-email-pdf', [\App\Http\Controllers\Profes\homeController::class,  'emailpdf']);

Route::get('/home_inicio',function(){
    dump("hola");
if (auth()->user()->Admin == 1) {
        return redirect('/admin/users');
    } else{
        return redirect('/profe/menu');
    }
});
Route::get('/', function () {
    return view('auth/login');
});

Route::get('/login', function () {
    return view('auth/login');
})->name("login");

Route::get('/index', function () {
    return view('admin/users/index');
})->name("super");


Route::get('/prueba', function () {
    return view('admin/users/anadirUsuarios');
})->name('');



Route::get('/nuevouspas/{id}', [\App\Http\Controllers\Admin\homeController::class, 'comprobarusuario']) ->name("nuevouspas");


Route::put('/admin/nuevapass/{id}', [\App\Http\Controllers\Admin\homeController::class,'AnuevaPass']) ->name('Nuevapass');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::group(['middleware' => 'auth'], function() {

Route::group(['middleware' => ['changepassword']], function () {
    
    //Nueva
    Route::get('/inicio1/{id}', [\App\Http\Controllers\Admin\homeController::class, 'comprobarusuario']) -> middleware(['middleware' => 'role:admin']);

    
    //ADMINISTRADORES
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::resource('users', \App\Http\Controllers\Admin\homeController::class);
    });

    //RUTAS
    
    Route::get('/admin/usuarios', [\App\Http\Controllers\Admin\homeController::class, 'usuarios']) -> middleware(['middleware' => 'role:admin'])->name('vistaUsers');
    
    Route::get('/admin/ciclos', [\App\Http\Controllers\Admin\homeController::class, 'ciclos']) -> middleware(['middleware' => 'role:admin'])->name('vistaUsers2');

    Route::get('/admin/grupos', [\App\Http\Controllers\Admin\homeController::class, 'grupos']) -> middleware(['middleware' => 'role:admin'])->name('vistaUsers3');
    
    Route::get('/admin/ufs', [\App\Http\Controllers\Admin\homeController::class, 'ufs']) -> middleware(['middleware' => 'role:admin'])->name('vistaUsers4');
   
    Route::get('/admin/alumnes', [\App\Http\Controllers\Admin\homeController::class, 'alumnes']) -> middleware(['middleware' => 'role:admin'])->name('vistaUsers5');


    //INSERCIONES
    Route::get('/admin/inserir', [\App\Http\Controllers\Admin\homeController::class, 'inserir']) -> middleware(['middleware' => 'role:admin']);

    Route::get('/admin/inserirc', [\App\Http\Controllers\Admin\homeController::class, 'inserirc']) -> middleware(['middleware' => 'role:admin']);

    Route::get('/admin/inserirg', [\App\Http\Controllers\Admin\homeController::class, 'inserirg']) -> middleware(['middleware' => 'role:admin']);

    Route::get('/admin/inseriru', [\App\Http\Controllers\Admin\homeController::class, 'inseriru']) -> middleware(['middleware' => 'role:admin']);

    Route::get('/admin/inserira', [\App\Http\Controllers\Admin\homeController::class, 'inserira']) -> middleware(['middleware' => 'role:admin']);



    Route::put('/admin/inserir/us', [\App\Http\Controllers\Admin\homeController::class, 'inserirUsu']) -> middleware(['middleware' => 'role:admin'])->name('InsU');

    Route::put('/admin/inserir/c', [\App\Http\Controllers\Admin\homeController::class, 'inserirCi']) -> middleware(['middleware' => 'role:admin'])->name('inserirCicle');
    
    Route::put('/admin/inserir/g', [\App\Http\Controllers\Admin\homeController::class, 'inserirgr']) -> middleware(['middleware' => 'role:admin'])->name('inserirG');

    Route::put('/admin/inserir/u', [\App\Http\Controllers\Admin\homeController::class, 'inseriruf']) -> middleware(['middleware' => 'role:admin'])->name('inserirU');

    Route::put('/admin/inserir/a', [\App\Http\Controllers\Admin\homeController::class, 'inseriral']) -> middleware(['middleware' => 'role:admin'])->name('inserirA');
   
    //Route::get('/admin/borrarusuarios/{$id}', function () {
     //   echo "hola";
   // })->name("borrarusu");




    //borrados
    Route::get('/admin/borrarusuarios/{id}', [\App\Http\Controllers\Admin\homeController::class,'eliminarusu']) -> middleware(['middleware' => 'role:admin'])->name('borrarusu');
   
    Route::get('/admin/borrarcicle/{id}', [\App\Http\Controllers\Admin\homeController::class,'eliminarciclo']) -> middleware(['middleware' => 'role:admin'])->name('borrarcicle');
    
    Route::get('/admin/borrarmodulos/{id}', [\App\Http\Controllers\Admin\homeController::class,'eliminargrupo']) -> middleware(['middleware' => 'role:admin'])->name('borrargrupo');
   
    Route::get('/admin/borraruf/{id}', [\App\Http\Controllers\Admin\homeController::class,'eliminaruf']) -> middleware(['middleware' => 'role:admin'])->name('borraruf');

    Route::get('/admin/borraralumne/{id}', [\App\Http\Controllers\Admin\homeController::class,'eliminaralumne']) -> middleware(['middleware' => 'role:admin'])->name('borraralumne');


    //UPDATES
    Route::get('/admin/ugrupo/{id}', [\App\Http\Controllers\Admin\homeController::class,'updategr']) -> middleware(['middleware' => 'role:admin'])->name('ugrupo');

    Route::put('/admin/upgrupo/{id}', [\App\Http\Controllers\Admin\homeController::class,'updategrupo']) -> middleware(['middleware' => 'role:admin'])->name('updategrupo');

    Route::get('/admin/editarufs/{id}', [\App\Http\Controllers\Admin\homeController::class,'updateuf']) -> middleware(['middleware' => 'role:admin'])->name('editarufs');

    Route::put('/admin/updateufs/{id}', [\App\Http\Controllers\Admin\homeController::class,'updateufs']) -> middleware(['middleware' => 'role:admin'])->name('updateuf');

    Route::get('/admin/ucicle/{id}', [\App\Http\Controllers\Admin\homeController::class,'ucicle']) -> middleware(['middleware' => 'role:admin'])->name('ucicle');

    Route::put('/admin/editarcicle/{id}', [\App\Http\Controllers\Admin\homeController::class,'editarcicle']) -> middleware(['middleware' => 'role:admin'])->name('editarcicle');

    Route::get('/admin/uuser/{id}', [\App\Http\Controllers\Admin\homeController::class,'uuser']) -> middleware(['middleware' => 'role:admin'])->name('uuser');
    
    Route::put('/admin/euser/{id}', [\App\Http\Controllers\Admin\homeController::class,'euser']) -> middleware(['middleware' => 'role:admin'])->name('euser');

    Route::get('/admin/eal/{id}', [\App\Http\Controllers\Admin\homeController::class,'ealumne']) -> middleware(['middleware' => 'role:admin'])->name('editalumne');

    Route::put('/admin/upal/{id}', [\App\Http\Controllers\Admin\homeController::class,'upalumne']) -> middleware(['middleware' => 'role:admin'])->name('upalumne');
    

    //PROFESORES
    Route::group(['middleware' => 'role:profe', 'prefix' => 'profe', 'as' => 'profe.'], function() {
        Route::resource('menu', \App\Http\Controllers\Profes\homeController::class);
    });

    Route::get('/profe/alumnes/{id_cicles}', [\App\Http\Controllers\Profes\homeController::class, 'alumnes']) -> middleware(['middleware' => 'role:profe'])->name('mostrarAlumnes');
    
    Route::get('/profe/alumne/{id}/{id_cicle}', [\App\Http\Controllers\Profes\homeController::class, 'alumneSol']) -> middleware(['middleware' => 'role:profe'])->name('alumneSol');
    
    Route::get('/profe/nota', [\App\Http\Controllers\Profes\homeController::class, 'notes']) -> middleware(['middleware' => 'role:profe'])->name('nota');

    Route::get('/profe/inserirnotasal/{id}/{id_cicles}', [\App\Http\Controllers\Profes\homeController::class, 'inserirnotas']) -> middleware(['middleware' => 'role:profe'])->name('inserirNotasAl');

    Route::get('/profe/insnotas/{id}/{id_modul}/{id_cicle}', [\App\Http\Controllers\Profes\homeController::class, 'insnotas']) -> middleware(['middleware' => 'role:profe'])->name('insnotas');

    Route::get('/profe/pdf/{id}', [\App\Http\Controllers\Profes\homeController::class, 'pdfs']) -> middleware(['middleware' => 'role:profe'])->name('pdf');

    Route::get('/profe/notasmodul/{id}', [\App\Http\Controllers\Profes\homeController::class, 'veurenotesmodul']) -> middleware(['middleware' => 'role:profe'])->name('notasGrup');


     });

});