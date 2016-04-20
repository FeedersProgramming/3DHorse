<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class foro extends Model
{
	protected $table = 'foro';

	protected $primaryKey = 'id_foro';

	protected $fillable = ['id', 'id_grupo', 'id_user', 'titulo', 'mensaje', 'fecha', 'respuestas', 'identificador', 'ult_respuesta'];

	public function scopeSearch($query, $name)
	{
		return $query->where('nombre', 'LIKE', "%$name%");
	}

	public function user()
	{
		return $this->belongsTo('App\foro');
	}

}
