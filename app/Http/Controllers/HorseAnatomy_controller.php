<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Grupo;
use App\osteologia;
use App\descripciones;
use App\resultados;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\grupo_user;
use DB;

class HorseAnatomy_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $estudiantes = User::orderBy('id', 'ASC')->where('rol', 'estudiante')->paginate(5);
        $profesores = User::orderBy('id', 'ASC')->where('rol', 'profesor')->paginate(5);

        $huesos = osteologia::orderBy('grupo', 'division', 'ASC')->get();
        $descripciones = descripciones::orderBy('id_descripcion', 'ASC')->get();

        $contadores = array();

        $contadores['estudiantes'] = User::where('rol', 'estudiante')->count();
        $contadores['profesores'] = User::where('rol', 'profesor')->count();
        $contadores['administradores'] = User::where('rol', 'administrador')->count();
        $contadores['grupos'] = Grupo::count();

        $regiones = osteologia::select('division', 'grupo')->groupBy('division', 'grupo')->orderBy('division', 'ASC')->get();

        $grupos = osteologia::select('grupo')->groupBy('grupo')->get();

        $division = osteologia::select('division')->groupBy('division')->get();

        $lista = osteologia::orderBy('grupo', 'division', 'ASC')->lists('nombre', 'id');

        $lista_count = osteologia::count();
        $lista[0] = $lista_count;

        foreach ($grupos as $grupo) {
            $grupo->grupo = str_replace(' ', '_', $grupo->grupo);
        }

        foreach ($regiones as $region) {
            $region->division = str_replace(' ', '_', $region->division);
        }


        foreach ($huesos as $hueso) {
            $hueso->estado = 'false';
        }

        foreach ($huesos as $hueso) {
            foreach ($descripciones as $descripcion) {
                if($hueso->id_descripcion == $descripcion->id_descripcion){
                    $hueso->descripcion = $descripcion->descripcion;
                    $hueso->descripcion2 = $descripcion->descripcion2;
                }
            }   
        }

        $resultados = resultados::where('id_users', Auth::user()->id)->get();

        $estadistica = "";
        $modulo1 = 0;
        $modulo2 = 0;
        $modulo3 = 0;
        $nocontestadas = 0;

        foreach ($resultados as $resultado) {

            if($resultado->id_evaluacion == "1" || $resultado->id_evaluacion == "2"){
                if($resultado->estado != "No Contestado"){
                    $modulo1 = $modulo1 + 16.65;
                }
            }else if($resultado->id_evaluacion == "3" || $resultado->id_evaluacion == "4"){
                if($resultado->estado != "No Contestado"){
                    $modulo2 = $modulo2 + 16.65;
                }
            }else if($resultado->id_evaluacion == "5" || $resultado->id_evaluacion == "6"){
                if($resultado->estado != "No Contestado"){
                    $modulo3 = $modulo3 + 16.65;
                }
            }
        }


        $vistas_partes = DB::select("select osteologia.nombre as hueso,partes.nombre as parte,partes.position,partes.orientation from partes inner join osteologia on id_hueso = osteologia.id order by id_hueso");


        //dd($vistas_partes);
        $nocontestadas = (100 - (($modulo1) + ($modulo2) + ($modulo3)));

        $grafica1 = array(array("Evaluacion"=>"Modulo1","value"=>"$modulo1"),array("Evaluacion"=>"Modulo2","value"=>"$modulo2"),array("Evaluacion"=>"Modulo3","value"=>"$modulo3"),array("Evaluacion"=>"No Contestadas","value"=>"$nocontestadas"));

        $grafica1 = json_encode($grafica1);
        //dd($grafica1);
        return view('HorseAnatomy.index')->with('tema', 'sandstone')
        /**/                             ->with('huesos', $huesos)
        /**/                             ->with('lista', $lista)
        /**/                             ->with('regiones', $regiones)
        /**/                             ->with('grupos', $grupos)
        /**/                             ->with('division', $division)
        /**/                             ->with('estudiantes', $estudiantes)
        /**/                             ->with('profesores', $profesores)
        /**/                             ->with('contadores', $contadores)
        /**/                             ->with('grafica1', $grafica1)
        /**/                             ->with('vistas_partes', $vistas_partes);
    }

    public function administrar()
    {   
        $estudiantes = User::orderBy('id', 'ASC')->where('rol', 'estudiante')->paginate(10);
        $profesores = User::orderBy('id', 'ASC')->where('rol', 'profesor')->paginate(10);

        $huesos = osteologia::orderBy('grupo', 'division', 'ASC')->get();

        $contadores = array();

        $contadores['estudiantes'] = User::where('rol', 'estudiante')->count();
        $contadores['profesores'] = User::where('rol', 'profesor')->count();
        $contadores['grupos'] = Grupo::count();

        $regiones = osteologia::select('division', 'grupo')->groupBy('division', 'grupo')->orderBy('division', 'ASC')->get();

        $grupos = osteologia::select('grupo')->groupBy('grupo')->get();

        $division = osteologia::select('division')->groupBy('division')->get();

        $lista = osteologia::orderBy('grupo', 'division', 'ASC')->lists('nombre', 'id');

        $lista_count = osteologia::count();
        $lista[0] = $lista_count;

        foreach ($grupos as $grupo) {
            $grupo->grupo = str_replace(' ', '_', $grupo->grupo);
        }

        foreach ($huesos as $hueso) {
            $hueso->estado = 'false';
        }
        /*for($i = 0; $i < count($grupos); $i++){
            $grupos[$i] = str_replace(' ', '_', $grupos[$i]);
        }*/

        //dd($estudiantes);
        return view('HorseAnatomy.administrar')->with('tema', 'sandstone')
        /**/                             ->with('huesos', $huesos)
        /**/                             ->with('lista', $lista)
        /**/                             ->with('regiones', $regiones)
        /**/                             ->with('grupos', $grupos)
        /**/                             ->with('division', $division)
        /**/                             ->with('estudiantes', $estudiantes)
        /**/                             ->with('profesores', $profesores)
        /**/                             ->with('contadores', $contadores);
    }

    public function perfil()
    {   
        $grupos = grupo_user::where('user_id', Auth::user()->id)->get();

        
        if(!empty($grupos)){
            foreach ($grupos->all() as $grupo) {
                $grup = Grupo::find($grupo->grupo_id);
                //dd($grupo->grupo_id);
                $grupos->grupos[$grupo->grupo_id] = $grup;
            }
        }/*else{
            $grupos->grupos[0] = "";
        }*/

        

        //dd($grupos);

        //if(empty($grupos)){
        return view('HorseAnatomy.perfil.perfil')->with('grupos', $grupos);
        //}else{

        //}
        
    }

    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
