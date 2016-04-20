<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Grupo;
use App\resultados;

class graficas_controller extends Controller
{

    public function grafica1($id)
    {
        $estadistica = "";
        $resultados = resultados::where('id_users', $id)->get();
        $modulo1 = 0;
        $modulo2 = 0;
        $modulo3 = 0;
        $nocontestadas = 0;

        foreach ($resultados as $resultado) {

                if($resultado->id_evaluacion == "1" || $resultado->id_evaluacion == "2"){//modulo1
                    if($resultado->estado != "No Contestado"){
                        $modulo1 = $modulo1 + 16.65;
                    }
                }else if($resultado->id_evaluacion == "3" || $resultado->id_evaluacion == "4"){//modulo2
                    if($resultado->estado != "No Contestado"){
                        $modulo2 = $modulo2 + 16.65;
                    }
                }else if($resultado->id_evaluacion == "5" || $resultado->id_evaluacion == "6"){//modulo3
                    if($resultado->estado != "No Contestado"){
                        $modulo3 = $modulo3 + 16.65;
                    }
                }
            }

            $nocontestadas = (100 - (($modulo1) + ($modulo2) + ($modulo3)));

            $array = array(array("Evaluacion"=>"Modulo1","value"=>"$modulo1"),array("Evaluacion"=>"Modulo2","value"=>"$modulo2"),array("Evaluacion"=>"Modulo3","value"=>"$modulo3"),array("Evaluacion"=>"No Contestadas","value"=>"$nocontestadas"));

            return json_encode($array);

            dd($modulo1 . ' - ' . $modulo2 . ' - ' . $nocontestadas);
        }




        public function index()
        {
        //
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
        //
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
