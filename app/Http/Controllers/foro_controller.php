<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\foro;
use App\User;
use App\Grupo;

class foro_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        //dd($id);
        //$foros = 
        //return view('HorseAnatomy.foros.foro');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set("America/Bogota");
        $foro = new foro($request->all());
        $foro->fecha = date("y-m-d");
        $foro->ult_respuesta = date("y-m-d");
        $foro->save();
        //dd($foro);
        if ($request->identificador != 0)
        {   
            $foro2 = foro::find($request->identificador);
            $foro2->respuestas = $foro2->respuestas + 1;
            $foro2->save();
            //dd($foro2);
            $foros = foro::join('users', 'foro.id_user', '=', 'users.id')->where('id_foro', '=', $foro2->id_foro)->get();
            $grupo = Grupo::find($foro2->id_grupo);
            $respuestas = foro::join('users', 'foro.id_user', '=', 'users.id')->where('foro.identificador', '=', $foro2->id_foro)->paginate(6);

            return view('HorseAnatomy.foros.foros')->with('foros', $foros)->with('respuestas', $respuestas)->with('grupo', $grupo);

        }else{

            $grupo = Grupo::find($foro->id_grupo);

            $foros = foro::join('users', 'foro.id_user', '=', 'users.id')->where('id_grupo', '=', $foro->id_grupo)->paginate(6);

            return view('HorseAnatomy.foros.foro')->with('foros', $foros)->with('grupo', $grupo);

        }

        //dd($foro);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $grupo = Grupo::find($id);

        $foros = foro::join('users', 'foro.id_user', '=', 'users.id')->where('id_grupo', '=', $id)->where('identificador', '=', 0)->paginate(6);

        //$foro = foro::find(1)->select('id_user')->user()->get();
        //dd($foros);
        return view('HorseAnatomy.foros.foro')->with('foros', $foros)->with('grupo', $grupo);
    }

    public function foro($id)
    {

        $foros = foro::join('users', 'foro.id_user', '=', 'users.id')->where('id_foro', '=', $id)->get();
        $grupo = Grupo::find($foros[0]->id_grupo);
        $contestadas = foro::join('users', 'foro.id_user', '=', 'users.id')->where('foro.identificador', '=', $id)->paginate(6);
        //dd($respuestas);
        return view('HorseAnatomy.foros.foros')->with('foros', $foros)->with('contestadas', $contestadas)->with('grupo', $grupo);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function crear($id)
    {       
        $datos = explode("-", $id);
        $id_grupo = $datos[0]; 
        $respuestas = $datos[1]; 
        $identificador = $datos[2]; 

        /*if ($identificador == 0 && $respuestas == 0) {

        }*/
        //dd($identificador);
        $grupo = Grupo::find($id_grupo);
        //dd($id);
        return view('HorseAnatomy.foros.crear')->with('grupo', $grupo)->with('respuestas', $respuestas)->with('identificador', $identificador);
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
