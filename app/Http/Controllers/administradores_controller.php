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

class administradores_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $administradores = User::Search($request->nombre)->orderBy('id', 'ASC')->where('rol', 'administrador')->paginate(12);
        return view('HorseAnatomy.administradores.administradores')->with('administradores', $administradores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('HorseAnatomy.administradores.create');
        dd('hola');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                //dd($request->all());
        $usuario = new User($request->all());

        if($request->file('imagen'))
        {
            //Inicio Imagen
            $file = $request->file('imagen');
            $name = $request->apellido . '_' . $request->nombre . '_' . $request->id . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\plugin\imagenes';
            $file->move($path, $name);
            //Fin Imagen 
            $usuario->imagen = $name;  
        }else{
            if ($request->genero == 'masculino') {
                $usuario->imagen = 'masculino.png';
            }else{
                $usuario->imagen = 'femenino.png';
            }
        }
        $usuario->password = bcrypt($request->password);
        $usuario->save();
        //dd($usuario);
        //$respuestas = new resultados();

        for ($i=1; $i <= 6; $i++) { 
            $resultados = new resultados;
            //echo $i;
            $resultados->id_evaluacion = $i;
            $resultados->id_users = $usuario->id;

            if ($i == 1 || $i == 2) {
                $resultados->divisiones = '0,0,0';
            }else if ($i == 3 || $i == 4) {
                $resultados->divisiones = '0,0';
            }else if ($i == 5 || $i == 6) {
                $resultados->divisiones = '0,0,0,0,0';
            }

            if ($i == 5 || $i == 6) {
                $resultados->respuestas = '0,0';
            }else{
                $resultados->respuestas = '0';
            }
            $resultados->estado = "No Contestado";
            $resultados->save();
            //dd($resultados);
        }
        ///Flash::success("Se ha Creado El Estudiante " . $request->nombre . ' ' . $request->apellido);
        return redirect()->route('HorseAnatomy.administradores.index');
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
        $user = User::find($id);
        $user->id2 = $user->id;
        //dd($user);   
        return view('HorseAnatomy.administradores.edit')->with('user', $user);
    }

    public function editA($id)
    {
        $user = User::find($id);
        $user->id2 = $user->id;
        $user->id = $user->id . '-1';
        //dd($user);   
        return view('HorseAnatomy.administradores.edit')->with('user', $user);
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
        $division = explode("-", $id);
        $estado = 0;

        if (empty($division[1])) {
            //dd($division[0]);
            $id = $division[0];
            $estado = 0;
        }else{
            //dd($division[0] . ' - ' . $division[1]);
            $id = $division[0];
            $estado = 1;
        }

        $usuario = User::find($id);

        $usuario->id = $request->id;
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->direccion = $request->direccion;
        $usuario->nacimiento = $request->nacimiento;
        $usuario->genero = $request->genero;
        $usuario->direccion = $request->direccion;
        $usuario->telefono = $request->telefono;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->rol = $request->rol;

        if($request->file('imagen'))
        {
            //Inicio Imagen
            $file = $request->file('imagen');
            $name = $request->apellido . '_' . $request->nombre . '_' . $request->id . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\plugin\imagenes';
            //Storage::delete(public_path() . $usuario->imagen);
            $file->move($path, $name);
            //Fin Imagen 
            $usuario->imagen = $name;  
        }else{
            if ($request->genero == 'masculino') {
                $usuario->imagen = 'masculino.png';
            }else{
                $usuario->imagen = 'femenino.png';
            }
        }
        //dd($usuario);
        $usuario->save();

        if ($estado == 1) {
            //dd('perfil');
            return redirect()->route('HorseAnatomy.administradores.index');
            //return 'hola';
        }else{
            return redirect()->route('HorseAnatomy.administradores.index');
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('HorseAnatomy.administradores.index');
    }
}
