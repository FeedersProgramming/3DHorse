<?php

/* USES */

use App\User;
use App\Grupo;
use App\resultados;

Route::get('/', [
	'uses' => 'HorseAnatomy_controller@index',
	'as' => 'index',
	'middleware' => 'auth'
	]);


Route::get('/test', function(){
	return view('HorseAnatomy.template.test');
});

Route::get('administrar', [
	'uses' => 'HorseAnatomy_controller@administrar',
	'as' => 'administrar',
	'middleware' => 'auth'
	]);


/* Profesores */

Route::get('profesores', [
	'uses' => 'HorseAnatomy_controller@profesores',
	'as' => 'profesores',
	'middleware' => 'auth'
	]);

/* Rutas Grupos */

Route::get('grupos', [
	'uses' => 'HorseAnatomy_controller@grupos',
	'as' => 'grupos',
	'middleware' => 'auth'
	]);

Route::get('grupos/{id}/edit', [
	'uses'	=>	'HorseAnatomy_controller@grupos_edit',
	'as'	=>	'grupos.edit'
	]);

Route::get('grupos/{id}/destroy', [
	'uses'	=>	'HorseAnatomy_controller@grupos_destroy',
	'as'	=>	'grupos.destroy'
	]);


// Authentication routes...
Route::post('login', [
	'uses' => 'Auth\AuthController@postLogin',
	'as' => 'login'
	]);

Route::post('registrar', [
	'uses' => 'Auth\AuthController@registrar',
	'as' => 'registrar'
	]);

Route::post('recuperar', [
	'uses' => 'Auth\AuthController@recuperar',
	'as' => 'recuperar'
	]);

Route::get('login', [
	'uses' => 'Auth\AuthController@getLogin',
	'as' => 'login'
	]);

Route::get('logout', [
	'uses' => 'Auth\AuthController@getLogout',
	'as' => 'logout'
	]);


Route::group(['prefix' => 'HorseAnatomy', 'middleware' => 'auth'], function(){

	Route::resource('administrar', 'HorseAnatomy_controller');

	Route::resource('estudiantes', 'estudiantes_controller');

	Route::get('estudiantesP/{id}/edit', [
		'uses'	=>	'estudiantes_controller@editE',
		'as'	=>	'HorseAnatomy.estudiantesP.edit'
		]);

	Route::get('estudiantes/{id}/destroy', [
		'uses'	=>	'estudiantes_controller@destroy',
		'as'	=>	'HorseAnatomy.estudiantes.destroy'
		]);

	Route::resource('profesores', 'profesores_controller');

	Route::get('profesores/{id}/destroy', [
		'uses'	=>	'profesores_controller@destroy',
		'as'	=>	'HorseAnatomy.profesores.destroy'
		]);

	Route::get('profesoresP/{id}/edit', [
		'uses'	=>	'profesores_controller@editP',
		'as'	=>	'HorseAnatomy.profesoresP.edit'
		]);

	Route::resource('administradores', 'administradores_controller');

	Route::get('administradoresP/{id}/edit', [
		'uses'	=>	'administradores_controller@editA',
		'as'	=>	'HorseAnatomy.administradoresP.edit'
		]);

	Route::get('administradores/{id}/destroy', [
		'uses'	=>	'administradores_controller@destroy',
		'as'	=>	'HorseAnatomy.administradores.destroy'
		]);

	Route::resource('grupos', 'grupos_controller');

	Route::get('grupos/{id}/grupo', [
		'uses'	=>	'grupos_controller@grupo',
		'as'	=>	'HorseAnatomy.grupos.grupo'
		]);

	Route::post('grupos/grupo', [
		'uses'	=>	'grupos_controller@grupo_almacenar',
		'as'	=>	'HorseAnatomy.grupos.grupo_almacenar'
		]);


	Route::get('grupos/{id}/destroy_grupo_almacenar', [
		'uses'	=>	'grupos_controller@destroy_grupo_almacenar',
		'as'	=>	'HorseAnatomy.grupos.destroy_grupo_almacenar'
		]);

	Route::get('grupos/{id}/asignar', [
		'uses'	=>	'grupos_controller@asignar',
		'as'	=>	'HorseAnatomy.grupos.asignar'
		]);

	Route::get('grupos/{id}/grupo_desasignar', [
		'uses'	=>	'grupos_controller@grupo_desasignar',
		'as'	=>	'HorseAnatomy.grupos.grupo_desasignar'
		]);

	Route::get('grupos/{id}/eliminar_grupo', [
		'uses'	=>	'grupos_controller@eliminar_grupo',
		'as'	=>	'HorseAnatomy.grupos.eliminar_grupo'
		]);

	Route::get('grupos/{id}/grupo_asignar', [
		'uses'	=>	'grupos_controller@grupo_asignar',
		'as'	=>	'HorseAnatomy.grupos.grupo_asignar'
		]);

	Route::get('grupos/{id}/destroy', [
		'uses'	=>	'grupos_controller@destroy',
		'as'	=>	'HorseAnatomy.grupos.destroy'
		]);

	Route::get('info_perfil', [
		'uses'	=>	'HorseAnatomy_controller@perfil',
		'as'	=>	'HorseAnatomy.perfil.info_perfil'
		]);

	Route::get('graficas/{id}/grafica1', [
		'uses'	=>	'graficas_controller@grafica1',
		'as'	=>	'HorseAnatomy.grupos.grafica1'
		]);

	Route::resource('foro', 'foro_controller');

	Route::get('foro/{id}/foro', [
		'uses'	=>	'foro_controller@foro',
		'as'	=>	'HorseAnatomy.foro.foro'
		]);

	Route::get('foro/{id}/crear', [
		'uses'	=>	'foro_controller@crear',
		'as'	=>	'HorseAnatomy.foro.crear'
		]);

	Route::get('grafica1/{id}', function($id){
		//dd($id);
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


			//$nocontestadas = (100 - ($modulo1) + ($modulo2) + ($modulo3));
			$nocontestadas = (100 - (($modulo1) + ($modulo2) + ($modulo3)));

			$array = array(array("Evaluacion"=>"Modulo1","value"=>"$modulo1"),array("Evaluacion"=>"Modulo2","value"=>"$modulo2"),array("Evaluacion"=>"Modulo3","value"=>"$modulo3"),array("Evaluacion"=>"No Contestadas","value"=>"$nocontestadas"));

			return json_encode($array);

			dd($modulo1 . ' - ' . $modulo2 . ' - ' . $nocontestadas);

		});

Route::get('verificar/{id}', function($id){
	return $id . ' - ' . $pass;
});

});