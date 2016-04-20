<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
	protected $table = 'grupos';

	protected $fillable = ['id', 'nombre', 'password', 'creador'];

	public function users()
	{
		return $this->belongsToMany('User');
	}

	public function scopeSearch($query, $name)
	{
		return $query->where('nombre', 'LIKE', "%$name%");
	}
}
