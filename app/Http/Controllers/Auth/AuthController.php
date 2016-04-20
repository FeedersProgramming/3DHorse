<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Storage;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }
    protected $redirectPath = '/';
    protected $loginPath = '/login';
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            ]);
    }

    protected function getLogin(){

        return view('HorseAnatomy.auth.login');
    }

    public function registrar(Request $request){
        //dd($request);

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
            $resultados->save();
            //dd($resultados);
        }
        //Flash::success("Se ha Creado El Usuario " . $request->nombre . ' ' . $request->apellido);
        return redirect()->route('login');

    }

    public function recuperar(Request $request){
       // dd($request);
        Flash::message('Recuperacion Exitosa');

        return redirect()->route('login');
    }
}
