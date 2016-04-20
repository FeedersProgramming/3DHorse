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

class grupos_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $grupos = Grupo::Search($request->nombre)->orderBy('id', 'ASC')->paginate(4);

        $user = User::orderBy('id', 'ASC')->get();

        //dd($grupos);
        return view('HorseAnatomy.grupos.grupos')->with('grupos', $grupos)->with('usuarios', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('HorseAnatomy.grupos.create');
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
        $grupo = new Grupo($request->all());
        $request->id = DB::select('select last_value from grupos_id_seq');
        $request->id = $request->id[0]->last_value + 1;


        if($request->file('imagen'))
        {
            //Inicio Imagen
            $file = $request->file('imagen');
            $name = $request->apellido . '_' . $request->nombre . '_' . $request->id . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\plugin\imagenes\grupos';
            $file->move($path, $name);
            //Fin Imagen 
            $grupo->imagen = $name;  
        }else{
            $grupo->imagen = 'grupos.jpg';
        }
        //$grupo->password = bcrypt($request->password);
        $grupo->creador = Auth::user()->id;
        //dd($grupo->creador);
        $grupo->save();

        //dd($request->id);
        $grupo_user = new grupo_user();
        $grupo_user->user_id = Auth::user()->id;
        $grupo_user->grupo_id = $request->id;
        $grupo_user->rol = "Profesor";
        $grupo_user->save();

        return redirect()->route('HorseAnatomy.grupos.index');
        
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

    public function asignar($id)
    {   
        //$grupos = DB::select("select * from grupos where not EXISTS (select user_id from grupo_user where grupos.id = grupo_user.grupo_id AND grupo_user.user_id = ".$id.")")->paginate(5);
        //dd($grupos);
        $user = $id;
        $grupos = DB::table('grupos')
        ->whereNotExists(function($query)
        {
            $query->select(DB::raw('user_id'))
            ->from('grupo_user')
            ->whereRaw('grupos.id = grupo_user.grupo_id')
            ->where('grupo_user.user_id', Auth::user()->id);
        })
        ->paginate(8);
        //dd($grupos);
        //return view('HorseAnatomy.grupos.asignar', ['grupos' => $grupos]);
        return view('HorseAnatomy.grupos.asignar')->with('grupos', $grupos);
    }

    public function grupo_asignar($id)
    {

        $grupo = grupo::find($id);

        $grupo_user = new grupo_user();
        $grupo_user->user_id = Auth::user()->id;
        $grupo_user->grupo_id = $id;

        if ($grupo->creador == Auth::user()->id) {
            $grupo_user->rol = "Profesor";
        }else{
            $grupo_user->rol = "Estudiante";
        }
        
        $grupo_user->save();

        return redirect()->route('HorseAnatomy.perfil.info_perfil', Auth::user()->id);

        //dd($grupo_user);
    }

    public function grupo_desasignar($id)
    {

        $grupo_user = grupo_user::where('grupo_id', '=', $id)->where('user_id', '=', Auth::user()->id)->delete();
        //dd($grupo_user);
        //$grupo_user->delete();
        return redirect()->route('HorseAnatomy.perfil.info_perfil', Auth::user()->id);

        //dd($grupo_user);
    }

    public function eliminar_grupo($id)
    {
        $datos = explode("_", $id);
        $id = $datos[0];
        $grupo = $datos[1];

        $grupo_user = grupo_user::where('grupo_id', '=', $grupo)->where('user_id', '=', $id)->delete();
        //dd($grupo_user);

        return redirect()->route('HorseAnatomy.grupos.grupo', $grupo);

        //dd($grupo_user);
    }

    public function grupo($id)
    {
        $grupo = Grupo::find($id);
        //$grupo_user = grupo_user::where('grupo_id', $id)->join('users', 'users.id', '=', 'grupo_user.creador')->get();
        $users_nuevos = DB::select('select * from users where not EXISTS (
            select user_id from grupo_user where 
            users.id = grupo_user.user_id AND grupo_user.grupo_id = '.$id.')');
        //$users_nuevos = User::orderBy('id', 'ASC')->whereNotExists()->get();
        $users_aux = "";
        $cont = 0;
        //dd($users_nuevos);
        foreach ($users_nuevos as $user) {
            $users_aux[$user->id] = $user->nombre . ' ' . $user->apellido;
        }
        $users_nuevos = $users_aux;

        $user = User::orderBy('id', 'ASC')->join('grupo_user', 'users.id', '=', 'grupo_user.user_id')->where('grupo_user.grupo_id', $id)->paginate(6);
        //dd($user);
        return view('HorseAnatomy.grupos.grupo')->with('grupo', $grupo)->with('users', $user)->with('users_nuevos', $users_nuevos);
    }

    public function grupo_almacenar(Request $request)
    {   

        foreach ($request->estudiantes as $estudiante) {
            $grupo_user = new grupo_user();
            $grupo_user->user_id = $estudiante;
            $grupo_user->grupo_id = $request->grupo;
            $grupo_user->rol = "Estudiante";
            $grupo_user->save();

        }

        return redirect()->route('HorseAnatomy.grupos.grupo', $request->grupo);
        //dd($request->estudiantes());
    }

    public function destroy_grupo_almacenar($id)
    {   

        dd($id);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupo = Grupo::find($id);
        //dd($user);   
        return view('HorseAnatomy.grupos.edit')->with('grupo', $grupo);
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
        $grupo = Grupo::find($id);

        $grupo->nombre = $request->nombre;

        if($request->file('imagen'))
        {
            //Inicio Imagen
            $file = $request->file('imagen');
            $name = $request->apellido . '_' . $request->nombre . '_' . $request->id . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\plugin\imagenes\grupos';
            $file->move($path, $name);
            //Fin Imagen 
            $grupo->imagen = $name;  
        }else{
            $grupo->imagen = 'grupos.jpg';
        }

        $grupo->password = bcrypt($request->password);
        //$grupo->update(['id' => $id]);
        $grupo->save();
        return redirect()->route('HorseAnatomy.grupos.index');
       // dd($grupo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupo = Grupo::find($id);
        $grupo->delete();

        return redirect()->route('HorseAnatomy.grupos.index');
    }
}
