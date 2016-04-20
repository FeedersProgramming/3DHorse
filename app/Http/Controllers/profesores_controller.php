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

class profesores_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $profesores = User::Search($request->nombre)->orderBy('id', 'ASC')->where('rol', 'profesor')->paginate(12);
        return view('HorseAnatomy.profesores.profesores')->with('profesores', $profesores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('HorseAnatomy.profesores.create');
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
        return redirect()->route('HorseAnatomy.profesores.index');
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
        return view('HorseAnatomy.profesores.edit')->with('user', $user);
    }

    public function editP($id)
    {
        $user = User::find($id);
        $user->id2 = $user->id;
        $user->id = $user->id . '-1';
        //dd($user);   
        return view('HorseAnatomy.profesores.edit')->with('user', $user);
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
                //dd($request);

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
        //$resultados->estado = "No Contestado";
        //dd($usuario);
        $usuario->save();
        return redirect()->route('HorseAnatomy.profesores.index');
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

        return redirect()->route('HorseAnatomy.profesores.index');
    }
}
