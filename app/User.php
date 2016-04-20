<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
	use Authenticatable, CanResetPassword;

	/**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'users';

	protected $fillable = ['id', 'nombre', 'apellido', 'direccion', 'telefono', 'email', 'nacimiento', 'genero', 'pass', 'imagen', 'rol'];

	protected $hidden = ['password', 'remember_token'];

	public function grupos()
	{
		return $this->belongsToMany('Grupo');
	}

	public function scopeSearch($query, $name)
	{
		return $query->where('nombre', 'LIKE', "%$name%");
	}

	public function foro()
	{
		return $this->hasOne('App\User');
	}
}
