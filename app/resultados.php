<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class resultados extends Model
{	
	protected $primaryKey = 'id_evaluacion';

	protected $table = 'resultados';

	protected $fillable = ['id_evaluacion', 'id_users', 'respuestas', 'divisiones', 'estado'];

	protected $hidden = ['remember_token'];

}
