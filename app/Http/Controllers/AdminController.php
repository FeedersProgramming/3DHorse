<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Auth;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inicio()
    {
        return View('HorseAnatomy.auth.login');
    }

    public function login()
    {
        $data = Input::only('email', 'password', 'remember');


        $credentials = ['email' => $data['email'], 'password' => $data['password']];
        dd(Auth::attempt($credentials, $data['remember']));
        if(Auth::attempt($credentials, $data['remember']))
        {   
            dd('logeo');
            return Redirect::route('HorseAnatomy.index');
        }

        return Redirect::back()->with('login_error', 1);
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('HorseAnatomy/auth/login');
    }
}
